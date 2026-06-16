<?php
/**
 * ContactFormHandler.php
 * Real Object-Oriented PHP contact handler.
 * 
 * This class demonstrates clean OOP design:
 * - Constructor dependency injection
 * - Single responsibility
 * - Validation logic encapsulated
 * - Ready to integrate with real database + mailer
 */

class ContactFormHandler {
    private $db;
    private $mailer;
    
    /**
     * Constructor with dependency injection
     * In production you would pass PDO and a real mailer service
     */
    public function __construct($dbConnection = null, $mailer = null) {
        $this->db = $dbConnection;
        $this->mailer = $mailer ?: new SimpleMailer();
    }
    
    /**
     * Main public method - processes the form submission
     */
    public function processSubmission(array $postData): array {
        // Sanitize all inputs
        $data = $this->sanitizeData($postData);
        
        // Validate
        $validation = $this->validate($data);
        if (!$validation['valid']) {
            return [
                'success' => false,
                'error' => $validation['message']
            ];
        }
        
        // Save to database (simulated if no real DB)
        $inquiryId = $this->saveToDatabase($data);
        
        // Send notification emails (OOP Mailer)
        $this->sendNotifications($data);
        
        // Log the inquiry
        $this->logInquiry($data);
        
        return [
            'success' => true,
            'message' => 'Thank you! Your message has been received. I will respond within 24 hours.',
            'inquiry_id' => $inquiryId
        ];
    }
    
    /**
     * Sanitize user input
     */
    private function sanitizeData(array $data): array {
        return [
            'name'    => htmlspecialchars(trim($data['name'] ?? '')),
            'email'   => filter_var(trim($data['email'] ?? ''), FILTER_SANITIZE_EMAIL),
            'company' => htmlspecialchars(trim($data['company'] ?? '')),
            'message' => htmlspecialchars(trim($data['message'] ?? '')),
        ];
    }
    
    /**
     * Validate the data
     */
    private function validate(array $data): array {
        if (empty($data['name'])) {
            return ['valid' => false, 'message' => 'Full name is required.'];
        }
        
        if (empty($data['email']) || !filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
            return ['valid' => false, 'message' => 'Please provide a valid email address.'];
        }
        
        if (empty($data['message'])) {
            return ['valid' => false, 'message' => 'Please tell me about your project.'];
        }
        
        if (strlen($data['message']) < 15) {
            return ['valid' => false, 'message' => 'Message must be at least 15 characters long.'];
        }
        
        return ['valid' => true];
    }
    
    /**
     * Persist to database (stub - replace with real PDO in production)
     */
    private function saveToDatabase(array $data): string {
        $inquiryId = 'inq_' . uniqid();
        
        // In a real application:
        // $stmt = $this->db->prepare("INSERT INTO inquiries (name, email, company, message, created_at) VALUES (?, ?, ?, ?, NOW())");
        // $stmt->execute([$data['name'], $data['email'], $data['company'], $data['message']]);
        // return $this->db->lastInsertId();
        
        return $inquiryId;
    }
    
    /**
     * Send emails using the injected mailer
     */
    private function sendNotifications(array $data): void {
        $this->mailer->sendAdminNotification($data);
        // Optionally send confirmation email to the user
        // $this->mailer->sendUserConfirmation($data);
    }
    
    /**
     * Simple file-based logging (replace with proper logger in production)
     */
    private function logInquiry(array $data): void {
        $logLine = date('Y-m-d H:i:s') . " | New inquiry from: {$data['name']} <{$data['email']}> | Company: {$data['company']}\n";
        
        // Uncomment in production:
        // @file_put_contents(__DIR__ . '/../logs/inquiries.log', $logLine, FILE_APPEND);
    }
}

/**
 * SimpleMailer - Lightweight OOP mailer abstraction
 * In production, replace this with PHPMailer, Symfony Mailer, or AWS SES
 */
class SimpleMailer {
    public function sendAdminNotification(array $data): bool {
        $subject = "New Portfolio Inquiry from " . $data['name'];
        
        $body = "You received a new inquiry:\n\n";
        $body .= "Name: {$data['name']}\n";
        $body .= "Email: {$data['email']}\n";
        $body .= "Company: {$data['company']}\n\n";
        $body .= "Message:\n{$data['message']}\n\n";
        $body .= "Sent at: " . date('Y-m-d H:i:s');
        
        // In a real environment:
        // mail('hello@marcusrivera.dev', $subject, $body);
        
        // For demo purposes we just return true
        return true;
    }
    
    public function sendUserConfirmation(array $data): bool {
        // Would send a thank you email to the user
        return true;
    }
}
?>