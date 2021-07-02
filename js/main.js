var fields = {};

document.addEventListener("DOMContentLoaded", function() {
  fields.names = document.getElementById('names');
  fields.email = document.getElementById('email');
  fields.phone = document.getElementById('phone');
  fields.message = document.getElementById('message');
})

function isNotEmpty(value) {
  if (value == null || typeof value == 'undefined' ) return false;
  return (value.length > 0);
}

function isNumber(num) {
  return (num.length > 0) && !isNaN(num);
}

function isEmail(email) {
  let regex = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$/;
  return regex.test(String(email).toLowerCase());
}

function fieldValidation(field, validationFunction) {
  if (field == null) return false;

  let isFieldValid = validationFunction(field.value)
  if (!isFieldValid) {
  field.className = 'placeholderRed';
  } else {
  field.className = '';
  }

  return isFieldValid;
}

function isValid() {
  var valid = true;

  valid &= fieldValidation(fields.names, isNotEmpty);
  valid &= fieldValidation(fields.email, isEmail);
  valid &= fieldValidation(fields.phone, isNumber);
  valid &= fieldValidation(fields.message, isNotEmpty);

  return valid;
}

class User {
  constructor(names, email, phone, message) {
    this.names = names;
    this.email = email;
    this.phone = phone;
    this.message = message;
  }
}

function contactMe() {
  if (isValid()) {
    let usr = new User(names.value, email.value, phone.value, message.value);

    alert(`${usr.names} thanks for getting in touch. we will get back to you shortly.`)
  } else {
    alert("there was an error")
  }
}