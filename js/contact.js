function sendMessage() {
  var nameInput = document.querySelector('input[type="text"][name="name"]');
  var inputEmail = document.querySelector('input[type="email"][name="email"]');
  var phoneInput = document.getElementById('phone');
  var messageInput = document.querySelector('textarea[name="message"]');
  var subjectInput = document.querySelector('input[type="text"][name="subject"]');

  var name = nameInput.value;
  var email = inputEmail.value;
  var phone = phoneInput.value;
  var message = messageInput.value;
  var subject = subjectInput.value;

  fetch('config/telegram.php')
      .then(response => response.json())
      .then(data => {
          var chatId = data.chatId;
          var token = data.token;
          var url = `https://api.telegram.org/bot${token}/sendMessage`;

          var text = `Name: ${name}\n\nEmail: ${email}\n\nPhone number: ${phone}\n\nSubject: ${subject}\n\nMessage: ${message}`;

          return axios.post(url, {
              chat_id: chatId,
              text: text,
          });
      })
      .then(function (response) {
          swal({
              title: "Success!",
              text: "Your request has been sent!",
              icon: "success",
              button: "OK",
          });
          nameInput.value = '';
          inputEmail.value = '';
          phoneInput.value = '';
          messageInput.value = '';
          subjectInput.value = '';
      })
      .catch(function (error) {
          swal({
              title: "Error",
              text: "Failed to send message. Please try again later.",
              icon: "error",
              button: "OK",
          });
          console.log(error);
      });
}
