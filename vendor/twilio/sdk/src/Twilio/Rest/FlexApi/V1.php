<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */

namespace Twilio\Rest\FlexApi;

use Twilio\Domain;
use Twilio\Exceptions\TwilioException;
use Twilio\InstanceContext;
use Twilio\Rest\FlexApi\V1\AssessmentsList;
use Twilio\Rest\FlexApi\V1\ChannelList;
use Twilio\Rest\FlexApi\V1\ConfigurationList;
use Twilio\Rest\FlexApi\V1\FlexFlowList;
use Twilio\Rest\FlexApi\V1\InsightsAssessmentsCommentList;
use Twilio\Rest\FlexApi\V1\InsightsQuestionnairesCategoryList;
use Twilio\Rest\FlexApi\V1\InsightsQuestionnairesList;
use Twilio\Rest\FlexApi\V1\InsightsQuestionnairesQuestionList;
use Twilio\Rest\FlexApi\V1\InsightsSegmentsList;
use Twilio\Rest\FlexApi\V1\InsightsSessionList;
use Twilio\Rest\FlexApi\V1\InsightsSettingsAnswerSetsList;
use Twilio\Rest\FlexApi\V1\InsightsSettingsCommentList;
use Twilio\Rest\FlexApi\V1\InsightsUserRolesList;
use Twilio\Rest\FlexApi\V1\InteractionList;
use Twilio\Rest\FlexApi\V1\WebChannelList;
use Twilio\Version;

/**
 * @property ChannelList $channel
 * @property ConfigurationList $configuration
 * @property FlexFlowList $flexFlow
 * @property AssessmentsList $assessments
 * @property InsightsAssessmentsCommentList $insightsAssessmentsComment
 * @property InsightsQuestionnairesList $insightsQuestionnaires
 * @property InsightsQuestionnairesCategoryList $insightsQuestionnairesCategory
 * @property InsightsQuestionnairesQuestionList $insightsQuestionnairesQuestion
 * @property InsightsSegmentsList $insightsSegments
 * @property InsightsSessionList $insightsSession
 * @property InsightsSettingsAnswerSetsList $insightsSettingsAnswerSets
 * @property InsightsSettingsCommentList $insightsSettingsComment
 * @property InsightsUserRolesList $insightsUserRoles
 * @property InteractionList $interaction
 * @property WebChannelList $webChannel
 * @method \Twilio\Rest\FlexApi\V1\ChannelContext channel(string $sid)
 * @method \Twilio\Rest\FlexApi\V1\FlexFlowContext flexFlow(string $sid)
 * @method \Twilio\Rest\FlexApi\V1\InsightsQuestionnairesContext insightsQuestionnaires(string $id)
 * @method \Twilio\Rest\FlexApi\V1\InsightsQuestionnairesCategoryContext insightsQuestionnairesCategory(string $categoryId)
 * @method \Twilio\Rest\FlexApi\V1\InsightsQuestionnairesQuestionContext insightsQuestionnairesQuestion(string $questionId)
 * @method \Twilio\Rest\FlexApi\V1\InsightsSegmentsContext insightsSegments(string $segmentId)
 * @method \Twilio\Rest\FlexApi\V1\InteractionContext interaction(string $sid)
 * @method \Twilio\Rest\FlexApi\V1\WebChannelContext webChannel(string $sid)
 */
class V1 extends Version {
    protected $_channel;
    protected $_configuration;
    protected $_flexFlow;
    protected $_assessments;
    protected $_insightsAssessmentsComment;
    protected $_insightsQuestionnaires;
    protected $_insightsQuestionnairesCategory;
    protected $_insightsQuestionnairesQuestion;
    protected $_insightsSegments;
    protected $_insightsSession;
    protected $_insightsSettingsAnswerSets;
    protected $_insightsSettingsComment;
    protected $_insightsUserRoles;
    protected $_interaction;
    protected $_webChannel;

    /**
     * Construct the V1 version of FlexApi
     *
     * @param Domain $domain Domain that contains the version
     */
    public function __construct(Domain $domain) {
        parent::__construct($domain);
        $this->version = 'v1';
    }

    protected function getChannel(): ChannelList {
        if (!$this->_channel) {
            $this->_channel = new ChannelList($this);
        }
        return $this->_channel;
    }

    protected function getConfiguration(): ConfigurationList {
        if (!$this->_configuration) {
            $this->_configuration = new ConfigurationList($this);
        }
        return $this->_configuration;
    }

    protected function getFlexFlow(): FlexFlowList {
        if (!$this->_flexFlow) {
            $this->_flexFlow = new FlexFlowList($this);
        }
        return $this->_flexFlow;
    }

    protected function getAssessments(): AssessmentsList {
        if (!$this->_assessments) {
            $this->_assessments = new AssessmentsList($this);
        }
        return $this->_assessments;
    }

    protected function getInsightsAssessmentsComment(): InsightsAssessmentsCommentList {
        if (!$this->_insightsAssessmentsComment) {
            $this->_insightsAssessmentsComment = new InsightsAssessmentsCommentList($this);
        }
        return $this->_insightsAssessmentsComment;
    }

    protected function getInsightsQuestionnaires(): InsightsQuestionnairesList {
        if (!$this->_insightsQuestionnaires) {
            $this->_insightsQuestionnaires = new InsightsQuestionnairesList($this);
        }
        return $this->_insightsQuestionnaires;
    }

    protected function getInsightsQuestionnairesCategory(): InsightsQuestionnairesCategoryList {
        if (!$this->_insightsQuestionnairesCategory) {
            $this->_insightsQuestionnairesCategory = new InsightsQuestionnairesCategoryList($this);
        }
        return $this->_insightsQuestionnairesCategory;
    }

    protected function getInsightsQuestionnairesQuestion(): InsightsQuestionnairesQuestionList {
        if (!$this->_insightsQuestionnairesQuestion) {
            $this->_insightsQuestionnairesQuestion = new InsightsQuestionnairesQuestionList($this);
        }
        return $this->_insightsQuestionnairesQuestion;
    }

    protected function getInsightsSegments(): InsightsSegmentsList {
        if (!$this->_insightsSegments) {
            $this->_insightsSegments = new InsightsSegmentsList($this);
        }
        return $this->_insightsSegments;
    }

    protected function getInsightsSession(): InsightsSessionList {
        if (!$this->_insightsSession) {
            $this->_insightsSession = new InsightsSessionList($this);
        }
        return $this->_insightsSession;
    }

    protected function getInsightsSettingsAnswerSets(): InsightsSettingsAnswerSetsList {
        if (!$this->_insightsSettingsAnswerSets) {
            $this->_insightsSettingsAnswerSets = new InsightsSettingsAnswerSetsList($this);
        }
        return $this->_insightsSettingsAnswerSets;
    }

    protected function getInsightsSettingsComment(): InsightsSettingsCommentList {
        if (!$this->_insightsSettingsComment) {
            $this->_insightsSettingsComment = new InsightsSettingsCommentList($this);
        }
        return $this->_insightsSettingsComment;
    }

    protected function getInsightsUserRoles(): InsightsUserRolesList {
        if (!$this->_insightsUserRoles) {
            $this->_insightsUserRoles = new InsightsUserRolesList($this);
        }
        return $this->_insightsUserRoles;
    }

    protected function getInteraction(): InteractionList {
        if (!$this->_interaction) {
            $this->_interaction = new InteractionList($this);
        }
        return $this->_interaction;
    }

    protected function getWebChannel(): WebChannelList {
        if (!$this->_webChannel) {
            $this->_webChannel = new WebChannelList($this);
        }
        return $this->_webChannel;
    }

    /**
     * Magic getter to lazy load root resources
     *
     * @param string $name Resource to return
     * @return \Twilio\ListResource The requested resource
     * @throws TwilioException For unknown resource
     */
    public function __get(string $name) {
        $method = 'get' . \ucfirst($name);
        if (\method_exists($this, $method)) {
            return $this->$method();
        }

        throw new TwilioException('Unknown resource ' . $name);
    }

    /**
     * Magic caller to get resource contexts
     *
     * @param string $name Resource to return
     * @param array $arguments Context parameters
     * @return InstanceContext The requested resource context
     * @throws TwilioException For unknown resource
     */
    public function __call(string $name, array $arguments): InstanceContext {
        $property = $this->$name;
        if (\method_exists($property, 'getContext')) {
            return \call_user_func_array(array($property, 'getContext'), $arguments);
        }

        throw new TwilioException('Resource does not have a context');
    }

    /**
     * Provide a friendly representation
     *
     * @return string Machine friendly representation
     */
    public function __toString(): string {
        return '[Twilio.FlexApi.V1]';
    }
}