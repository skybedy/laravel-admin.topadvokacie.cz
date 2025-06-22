const initSignatureForm = () => {
  const countInput = document.getElementById('signature-count');
  const showButton = document.getElementById('show-form');
  const form = document.getElementById('signature-form');
  const template = document.getElementById('signature-template');
  const blocksWrapper = document.getElementById('signature-blocks');

  const updateForm = () => {
    const count = Math.min(parseInt(countInput.value, 10) || 1, 4);
    blocksWrapper.innerHTML = '';

    form.classList.remove('hidden');
    form.classList.add('flex');

    for (let i = 0; i < count; i++) {
      const clone = template.content.cloneNode(true);
      blocksWrapper.appendChild(clone);
    }
  };

  showButton.addEventListener('click', updateForm);
  countInput.addEventListener('input', updateForm);
};

const initLiveSearchMultiple = () => {
  let debounceTimeout;
  const suggestionTemplate = document.getElementById('suggestion-template');

  document.addEventListener('input', (e) => {
    if (!e.target.classList.contains('lastname-input')) return;

    const input = e.target;
    const container = input.closest('[data-signature-block]');
    const suggestionBox = container.querySelector('.suggestions');
    const query = input.value.trim();

    clearTimeout(debounceTimeout);

    if (query.length < 2) {
      suggestionBox.innerHTML = '';
      suggestionBox.classList.add('hidden');
      return;
    }

    debounceTimeout = setTimeout(() => {
      fetch('/search-users', {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json',
          'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
        },
        body: JSON.stringify({ lastname: query })
      })
        .then(res => res.json())
        .then(users => {
          suggestionBox.innerHTML = '';

          if (!users.length) {
            suggestionBox.classList.add('hidden');
            return;
          }

          users.forEach(user => {
            const clone = suggestionTemplate.content.cloneNode(true);
            clone.querySelector('.name').textContent = `${user.firstname} ${user.lastname}`;
            clone.querySelector('.dob').textContent = `(${user.dob})`;

            const item = clone.querySelector('.suggestion-item');
            item.addEventListener('click', () => {
              container.querySelector('.firstname-input').value = user.firstname;
              container.querySelector('.dob-input').value = user.dob;
              container.querySelector('.place-input').value = user.place_of_birth;
              // přidej další pole dle potřeby

              suggestionBox.innerHTML = '';
              suggestionBox.classList.add('hidden');
            });

            suggestionBox.appendChild(clone);
          });

          suggestionBox.classList.remove('hidden');
        });
    }, 300);
  });
};

// Spustit obě funkce
initSignatureForm();
initLiveSearchMultiple();
