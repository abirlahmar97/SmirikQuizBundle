<?php

namespace Smirik\QuizBundle\Model;

use Smirik\QuizBundle\Model\om\BaseUserQuestion;

class UserQuestion extends BaseUserQuestion
{
    public function addAnswer($answer, $answer_text = false)
    {
        /**
         * Check is this answer for question we need
         */
        if ($this->getQuestion()->getId() != $answer->getQuestionId()) {
            throw new \Exception ('Question and Answer does not respond');
        }

        if ($answer_text !== false) {
            if (strcasecmp($answer->getIsRight(), $answer_text) === 0) {
                $this->setIsRight(true);
            } else {
                $this->setIsRight(false);
            }
            $this->setAnswerText($answer_text);
        } else {
            $this->setIsRight($answer->getIsRight());
        }
        $this->setAnswer($answer);
        $this->setAnswerText($answer_text);
        $this->save();
    }

} // UserQuestion
