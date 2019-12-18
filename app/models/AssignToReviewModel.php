<?php


class AssignToReviewModel extends MenuModel
{
    public function __construct()
    {
        parent::__construct();
        $this->loadSubmissions();
    }

    private function loadSubmissions(){


        $this->data['submissions'] = Database::GetInstance()->RunQuery(
            'SELECT title, author, abstract, accepted, userId, id FROM ' . SUBMISSIONS_TABLE, [], true);

        for($i = 0; $i < count($this->data['submissions']); $i++){

            $submission = $this->data['submissions'][$i];
            $reviews = Database::GetInstance()->RunQuery(
                'SELECT originality, topic, technicalQuality, languageQuality, recommended, note, reviewerId FROM ' . REVIEWS_TABLE .
                ' WHERE submissionId = ?' , [$submission['id']], true);

            $submission['reviews'] = $reviews;

            for($j = 0; $j < count($submission['reviews']); $j++){
                $submission['reviews'][$j]['total'] =
                    $submission['reviews'][$j]['originality'] +
                    $submission['reviews'][$j]['topic'] +
                    $submission['reviews'][$j]['technicalQuality'] +
                    $submission['reviews'][$j]['languageQuality'] +
                    $submission['reviews'][$j]['recommended'];
                $submission['reviews'][$j]['reviewer'] = Database::GetInstance()->RunQuery(
                    'SELECT first_name FROM '. USER_TABLE . ' WHERE id = ?', [$submission['reviews'][$j]['reviewerId']])[0]->first_name;
            }

            $submission['accepted'] = $submission['accepted'] === true ? 'Accepted' : 'Denied';
            $submission['numEmpty'] = 3 - count($reviews);
            $this->data['submissions'][$i] = $submission;
        }

        $this->data['reviewers'] = Database::GetInstance()->RunQuery('SELECT first_name, id FROM ' . USER_TABLE, [], true);
    }
}