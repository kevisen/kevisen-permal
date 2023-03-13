document.querySelector('#contact_form').addEventListener('submit', (event) => {
  event.preventDefault();
  const form = event.target;
  const formData = new FormData(form);
  const xhr = new XMLHttpRequest();
  xhr.open(form.method, form.action);
  xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
  xhr.onreadystatechange = function() {
    if (xhr.readyState === XMLHttpRequest.DONE) {
      const response = JSON.parse(xhr.responseText);
      const returnMessage = form.querySelector('.returnmessage');
      if (xhr.status === 200) {
        returnMessage.innerHTML = response.success;
        form.reset();
      } else {
        returnMessage.innerHTML = response.error;
      }
    }
  };
  xhr.send(new URLSearchParams(formData).toString());
});
