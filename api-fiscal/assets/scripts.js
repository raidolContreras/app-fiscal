
    function toggleVisibility(id) {
      var description = document.getElementById(id + '-description');
      var endpoint = document.getElementById(id + '-endpoint');
      var section = document.querySelector('.api-section.clicked');
      if (section && section !== event.currentTarget) {
        section.classList.remove('clicked');
        section.querySelector('.api-description').style.display = 'none';
        section.querySelector('.api-endpoint').style.display = 'none';
      }

      description.style.display = (description.style.display === "none") ? "block" : "none";
      endpoint.style.display = (endpoint.style.display === "none") ? "block" : "none";
      event.currentTarget.classList.add('clicked');
    }

    function copyToClipboard(elementId) {
      var copyText = document.querySelector(elementId);
      var textArea = document.createElement('textarea');
      textArea.value = copyText.innerText;
      document.body.appendChild(textArea);
      textArea.select();
      document.execCommand('copy');
      document.body.removeChild(textArea);
      var button = event.currentTarget;
    }