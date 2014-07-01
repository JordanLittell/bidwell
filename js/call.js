
//USE MANDRILL TO SEND EMAIL VIA AJAX. WRITE FUNCTION TO ACCEPT
//NAME AND EMAIL AS PARAMETERS AND INPUT THEM IN AJAX REQUEST

$.ajax({
  type: “POST”,
  url: “https://mandrillapp.com/api/1.0/messages/send.json”,
  data: {
    ‘key’: ‘NxRKkZ2ghII7jha6DH4tWw’,
    ‘message’: {
      ‘from_email’: ‘SITE USER’,
      ‘to’: [
          {
            ‘email’: ‘jordanlittell@gmail.com’,
            ‘name’: ‘Jordan’,
            ‘type’: ‘to’
          }
        ],
      ‘autotext’: ‘true’,
      ‘subject’: ‘Bidwell Self Storage Lead’,
      ‘html’: ‘YOUR EMAIL CONTENT HERE! YOU CAN USE HTML!’
    }
  }
 }).done(function(response) {
   console.log(response); // if you're into that sorta thing
 });