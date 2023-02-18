<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */

namespace Twilio\Rest\FlexApi\V1;

use Twilio\Options;
use Twilio\Values;

/**
 * PLEASE NOTE that this class contains preview products that are subject to change. Use them with caution. If you currently do not have developer preview access, please contact help@twilio.com.
 */
abstract class InsightsSegmentsOptions {
    /**
     * @param string $token The Token HTTP request header
     * @return FetchInsightsSegmentsOptions Options builder
     */
    public static function fetch(string $token = Values::NONE): FetchInsightsSegmentsOptions {
        return new FetchInsightsSegmentsOptions($token);
    }
}

class FetchInsightsSegmentsOptions extends Options {
    /**
     * @param string $token The Token HTTP request header
     */
    public function __construct(string $token = Values::NONE) {
        $this->options['token'] = $token;
    }

    /**
     * The Token HTTP request header
     *
     * @param string $token The Token HTTP request header
     * @return $this Fluent Builder
     */
    public function setToken(string $token): self {
        $this->options['token'] = $token;
        return $this;
    }

    /**
     * Provide a friendly representation
     *
     * @return string Machine friendly representation
     */
    public function __toString(): string {
        $options = \http_build_query(Values::of($this->options), '', ' ');
        return '[Twilio.FlexApi.V1.FetchInsightsSegmentsOptions ' . $options . ']';
    }
}