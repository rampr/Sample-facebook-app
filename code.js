
      function postToFeed() {

        // calling the API ...
        var obj = {
          method: 'feed',
          link: 'https://developers.facebook.com/docs/reference/dialogs/',
          picture: 'http://fbrell.com/f8.jpg',
          name: 'I won this',
          caption: 'This is a subtitle',
          description: 'I won this wonderful award. You should click and see the award'
        };

        function callback(response) {
          document.getElementById('msg').innerHTML = "Post ID: " + response['post_id'];
        }

        FB.ui(obj, callback);
      }


function sendRequest() {
    FB.ui({method: 'apprequests',
           message: 'My Great Request',
           to: "", 
           }, null);
}
    
