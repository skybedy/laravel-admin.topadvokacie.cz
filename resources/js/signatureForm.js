const initSignatureForm = () => {
  //const countInput = document.getElementById('signature-count');
  const showButton = document.getElementById('show-form');
  const form = document.getElementById('signature-form');
  const template = document.getElementById('signature-template');
  const blocksWrapper = document.getElementById('signature-blocks');

  let counter = 0;      

const updateForm = () => {
  const bloky = document.querySelectorAll('[data-signature-block]').length;

  if (bloky < 4) {
    form.classList.remove('hidden');
    form.classList.add('block');

    const clone = template.content.cloneNode(true);

    // Přepsání všech inputů uvnitř bloku podle aktuálního indexu
    clone.querySelectorAll('input[name^="signatures[]"], select[name^="signatures[]"]').forEach(input => {
      const name = input.getAttribute('name');
      const newName = name.replace('signatures[]', `signatures[${counter}]`);
      input.setAttribute('name', newName);
    });

    blocksWrapper.appendChild(clone);
    counter++;
  }
};

     

  const handleDocumentClick = (event) => {



  if (event.target.hasAttribute('data-close-btn')){
        
   
        
        
        const block = event.target.closest('div');
        
        block.remove();





        const bloky = document.querySelectorAll('[data-signature-block]').length;


        if(bloky == 0)
        {
          form.classList.remove('block');
          form.classList.add('hidden');

        }

     
            
       
    }


      if (event.target.hasAttribute('data-suggestion-close-btn')){

           /*
        const firstDiv = e.target.closest('div');
        const secondDiv = firstDiv ? firstDiv.parentElement.closest('div') : null;
        */

        const suggestionBox1 = document.querySelector('.suggestions');
      
        suggestionBox1.classList.add('hidden'); 

         }

};




  showButton.addEventListener('click', updateForm);
  //countInput.addEventListener('input', updateForm);
  document.addEventListener('click', handleDocumentClick) 
  
};




const initLiveSearchMultiple = () => {
  let debounceTimeout;
  const suggestionTemplate = document.getElementById('suggestion-template');

  document.addEventListener('input', (e) => {                   
    if (!e.target.classList.contains('lastname-input')) return;

    const input = e.target;                 
    const container = input.closest('[data-signature-block]');
    const suggestionBox = container.querySelector('.suggestions');
    const suggestionContent = suggestionBox.querySelector('.suggestion-box');
    const query = input.value.trim();

    clearTimeout(debounceTimeout);

    if (query.length < 2) {
       suggestionContent.innerHTML = '';
      suggestionBox.classList.add('hidden');
      return;
    }

    debounceTimeout = setTimeout(() => {
      fetch(`/api/autocomplete-customer?lastname=${encodeURIComponent(query)}`)
        .then(res => res.json())
        .then(users => {
      
          suggestionContent.innerHTML = '';

          if (!users.length) {
            suggestionBox.classList.add('hidden');
            return;
          }

          users.forEach(user => {
            const clone = suggestionTemplate.content.cloneNode(true);
            clone.querySelector('.name').textContent = `${user.firstname} ${user.lastname}, `;
            clone.querySelector('.dob').textContent = `${user.dob_format}`;

            const item = clone.querySelector('.suggestion-item');
            item.addEventListener('click', () => {
              container.querySelector('.id-input').value = user.id;

              container.querySelector('.title_before-input').value = user.title_before;
              container.querySelector('.title_after-input').value = user.title_after;
              container.querySelector('.lastname-input').value = user.lastname;

              container.querySelector('.firstname-input').value = user.firstname;
              container.querySelector('.dob-input').value = user.dob_format;
              container.querySelector('.pob-input').value = user.pob;
              container.querySelector('.street-input').value = user.street;
              container.querySelector('.city-input').value = user.city;
              container.querySelector('.postcode-input').value = user.postcode;
              container.querySelector('.document_number-input').value = user.document_number;

              const genderSelect = container.querySelector('.gender-select');
              const optionToGenderSelect = genderSelect.querySelector(`option[value="${user.gender === 'M' ? 'M' : 'Z'}"]`);
              if (optionToGenderSelect) {
                optionToGenderSelect.selected = true;
              }

                  
              const select = container.querySelector('.document-type-select');
              const optionToSelect = select.querySelector(`option[value="${user.document_type === 1 ? '1' : '2'}"]`);
              if (optionToSelect) {
                optionToSelect.selected = true;
              }

              suggestionContent.innerHTML = '';
              suggestionBox.classList.add('hidden');
            });

              suggestionContent.appendChild(clone);
          });

          suggestionBox.classList.remove('hidden');
        });
    }, 300);
  });
};

// Spustit obě funkce
initSignatureForm();
initLiveSearchMultiple();
