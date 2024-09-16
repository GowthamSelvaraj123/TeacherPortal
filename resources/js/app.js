import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

document.addEventListener('DOMContentLoaded', function() {
  function openModal(modalId) {
      var modal = document.getElementById(modalId);
      if (modal) {
          modal.style.display = "block";
      }
  }
  function closeModal(modalId) {
      var modal = document.getElementById(modalId);
      if (modal) {
          modal.style.display = "none";
      }
  }
  document.querySelectorAll('[data-modal]').forEach(function(element) {
      element.addEventListener('click', function() {
          var modalId = this.getAttribute('data-modal');
          openModal(modalId);
      });
  });
  document.querySelectorAll('.close').forEach(function(span) {
      span.addEventListener('click', function() {
          var modalId = this.getAttribute('data-modal');
          closeModal(modalId);
      });
  });
  window.addEventListener('click', function(event) {
      if (event.target.classList.contains('popup-modal')) {
          closeModal(event.target.id);
      }
  });
});

