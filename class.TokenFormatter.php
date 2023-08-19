<?php

class TokenFormatter {
    protected $tokenHandler;

    public function __construct(TokenHandler $tokenHandler) {
        $this->tokenHandler = $tokenHandler;
    }

    private function formatTime($timeString) {
        $timeString = trim($timeString);
        $formattedTime = date('g:ia', strtotime($timeString));
      
        if (strpos($formattedTime, ':00') !== false) {
          $formattedTime = str_replace(':00', '', $formattedTime);
        }
        return ltrim($formattedTime, '0');
    }

    private function formatTimeRange($timeStart, $timeEnd, $separater = '&ndash;') {
        $timeStart = trim($timeStart);
        $timeEnd = trim($timeEnd);
        return $this->formatTime($timeStart) . $separater . $this->formatTime($timeEnd);
      }

    public function getValue($tokenName) {
        $tokenValue = $this->tokenHandler->getTokenValue($tokenName);
        return htmlspecialchars($tokenValue, ENT_QUOTES, 'UTF-8');
    }

    public function output($tokenName) {
        $tokenValue = $this->tokenHandler->getTokenValue($tokenName);
        echo htmlspecialchars($tokenValue, ENT_QUOTES, 'UTF-8');
    }

    public function outputTimeRange($tokenStart, $tokenEnd, $separater = '&ndash;') {
        $tokenStartValue = $this->tokenHandler->getTokenValue($tokenStart);
        $tokenEndValue = $this->tokenHandler->getTokenValue($tokenEnd);
        $timeRange = $this->formatTimeRange($tokenStartValue, $tokenEndValue, $separater);
        echo htmlspecialchars($timeRange, ENT_QUOTES, 'UTF-8', false); // preserve encoded entities
    }

    public function outputTelOutsideUK($tokenName) {
        $tokenValue = $this->tokenHandler->getTokenValue($tokenName);
        if (substr($tokenName,0 ,1) === '0') {
          $tokenValue = '+44 ' . ltrim($tokenValue, '0');
        }
        echo htmlspecialchars($tokenValue, ENT_QUOTES, 'UTF-8');
    }
}