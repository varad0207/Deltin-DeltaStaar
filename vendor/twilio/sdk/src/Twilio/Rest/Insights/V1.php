<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */

namespace Twilio\Rest\Insights;

use Twilio\Domain;
use Twilio\Exceptions\TwilioException;
use Twilio\InstanceContext;
use Twilio\Rest\Insights\V1\CallList;
use Twilio\Rest\Insights\V1\CallSummariesList;
use Twilio\Rest\Insights\V1\ConferenceList;
use Twilio\Rest\Insights\V1\RoomList;
use Twilio\Rest\Insights\V1\SettingList;
use Twilio\Version;

/**
 * @property SettingList $settings
 * @property CallList $calls
 * @property CallSummariesList $callSummaries
 * @property ConferenceList $conferences
 * @property RoomList $rooms
 * @method \Twilio\Rest\Insights\V1\CallContext calls(string $sid)
 * @method \Twilio\Rest\Insights\V1\ConferenceContext conferences(string $conferenceSid)
 * @method \Twilio\Rest\Insights\V1\RoomContext rooms(string $roomSid)
 */
class V1 extends Version {
    protected $_settings;
    protected $_calls;
    protected $_callSummaries;
    protected $_conferences;
    protected $_rooms;

    /**
     * Construct the V1 version of Insights
     *
     * @param Domain $domain Domain that contains the version
     */
    public function __construct(Domain $domain) {
        parent::__construct($domain);
        $this->version = 'v1';
    }

    protected function getSettings(): SettingList {
        if (!$this->_settings) {
            $this->_settings = new SettingList($this);
        }
        return $this->_settings;
    }

    protected function getCalls(): CallList {
        if (!$this->_calls) {
            $this->_calls = new CallList($this);
        }
        return $this->_calls;
    }

    protected function getCallSummaries(): CallSummariesList {
        if (!$this->_callSummaries) {
            $this->_callSummaries = new CallSummariesList($this);
        }
        return $this->_callSummaries;
    }

    protected function getConferences(): ConferenceList {
        if (!$this->_conferences) {
            $this->_conferences = new ConferenceList($this);
        }
        return $this->_conferences;
    }

    protected function getRooms(): RoomList {
        if (!$this->_rooms) {
            $this->_rooms = new RoomList($this);
        }
        return $this->_rooms;
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
        return '[Twilio.Insights.V1]';
    }
}