<?php
class php_google_analytics {
  
  public function send($data) {
    $url = 'https://ssl.google-analytics.com/collect';
    $post_string = '?payload_data&';
    $post_string .= http_build_query($data);

    $parts = parse_url($url);
    $port = isset($parts['port']) ? $parts['port'] : 80;
    $success = $fp = fsockopen($parts['host'], $port, $errno, $errstr, 30);
    
    if ($fp) {
      $output = "POST " . $parts['path'] . " HTTP/1.1\r\n";
      $output .= "Host: " . $parts['host'] . "\r\n";
      $output .= "Content-Type: application/x-www-form-urlencoded\r\n";
      $output .= "Content-Length: " . strlen($post_string) . "\r\n";
      $output .= "Connection: Close\r\n\r\n";
      $output .= isset($post_string) ? $post_string : '';

      $success = fwrite($fp, $output);
      fclose($fp);
    }

    return $success ? true : false;
  }
  
}
