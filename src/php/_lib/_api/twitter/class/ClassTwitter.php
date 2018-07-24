<?php
/*
* TWITTER API WP PLUGIN: CLASS FEED
* Desenvolvedor: Nicholas Lima
* Email: nick.lima.wp@gmail.com
*/

class ClassTwitter {

    public function getTweet(){

        // Twitter OAuth Config options
        $oauth_access_token        = '62823322-rrJPZtNK07myq28nLwvkaDd0RiezRLIGR1SoGOXkH'; // Access token
        $oauth_access_token_secret = 'ZuDZONqRTH6gMfQh7WjrMm3CuV01thZuXcM17a5tXjLus'; // Access token secret
        $consumer_key              = 'em82A3V15YiXevoARXixFFqlP'; // API key
        $consumer_secret           = 'RoNxUL195mh6VYxyMBEDXCrtqs0aPYv0hIjlcU8J2s9o2zxwoO'; // API secret
        $user_id                   = '62823322'; // Owner ID
        $screen_name               = 'WesleySafadao'; // Owner
        $count = 5;

        $twitter_url = 'statuses/user_timeline.json?user_id=' . $user_id.'&screen_name='.$screen_name.'&count='.$count;

        $twitter_proxy = new TwitterProxy(
            $oauth_access_token,
            $oauth_access_token_secret,
            $consumer_key,
            $consumer_secret,
            $user_id,
            $screen_name,
            $count
        );

        // Invoke the get method to retrieve results via a cURL request
        $tweets = $twitter_proxy->get($twitter_url);
        $tweets = json_decode($tweets);

        //FETCH JSON
        echo '<ul id="owl-tweet">';
            foreach ($tweets as $tweet) {
                echo '<li>'.$this->linkify_twitter_status($tweet->text).'</li>';
            }
        echo '</ul>';
    }

    private function linkify_twitter_status($status_text) {
      // linkify URLs
      $status_text = preg_replace(
        '/(https?:\/\/\S+)/',
        '<a target="_blank" href="\1">\1</a>',
        $status_text
      );

      // linkify twitter users
      $status_text = preg_replace(
        '/(^|\s)@(\w+)/',
        '\1@<a target="_blank" href="http://twitter.com/\2">\2</a>',
        $status_text
      );

      // linkify tags
      $status_text = preg_replace(
        '/#(\w+\S+[^\.\s])/',
        '#<a target="_blank" href="http://twitter.com/search?q=\1">\1</a>',
        $status_text
      );

      return $status_text;
    }
}