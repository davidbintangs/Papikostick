
# Web-Based Papikostik Assessment Application

This repository contains **a code snippet** for a web-based Papikostik assessment application developed using CodeIgniter 3. The application simplifies the psychological assessment process, focusing on accurate scoring and efficient data management. Note: This repository only includes modules related to the Papikostik assessment process. Login functionality and other unrelated features are not included.

## Features
- **User-Friendly Interface**: Simplifies assessment navigation and input for users.
- **Auto-Save Functionality**: Prevents data loss during assessments.
- **Accurate Scoring**: Implements mathematical models for automated scoring of Papikostik dimensions.
- **Secure Data Management**: Ensures secure storage and handling of assessment results.
- **Responsive Design**: Optimized for various devices (desktop, tablet, and mobile).

## Mathematical Model for Scoring
The scoring method for Papikostik dimensions follows the formula below:

\[
\text{Total\_Score}_{\text{Dimensi}} = \sum_{i=1}^n \text{Score}_i
\]

Where:
- **Total_Score_Dimensi**: The total score for a specific personality dimension.
- **Score_i**: The score for each response relevant to that dimension.

## Code Snippet (PHP with CodeIgniter 3)
This repository contains an example implementation of the scoring algorithm in CodeIgniter:

**Controller Example** (`Papikostik.php`):
```php
class Papikostik extends CI_Controller {
    public function calculate_score() {
        $responses = $this->input->post('responses'); // Array of user responses
        $total_score = array_sum($responses); // Summing scores
        echo json_encode(['total_score' => $total_score]);
    }
}
```

**Model Example** (`Papikostik_model.php`):
```php
class Papikostik_model extends CI_Model {
    public function get_question_scores($question_ids) {
        $this->db->where_in('question_id', $question_ids);
        return $this->db->get('questions')->result_array();
    }
}
```

**View Example** (`assessment_view.php`):
```html
<form id="assessment_form" method="POST" action="<?= site_url('Papikostik/calculate_score') ?>">
    <!-- Example input fields for responses -->
    <input type="number" name="responses[]" value="5">
    <input type="number" name="responses[]" value="3">
    <input type="number" name="responses[]" value="4">
    <button type="submit">Submit</button>
</form>
```

## Disclaimer
This repository includes **only code snippets** relevant to the Papikostik assessment module. Features such as authentication, database schema setup, and deployment configurations are not included.

## Contribution
Contributions are welcome! If you have suggestions or improvements, feel free to submit a pull request or issue.
