const signatureForm = () => {
  const countInput = document.getElementById('signature-count');
  const showButton = document.getElementById('show-form');
  const form = document.getElementById('signature-form');
  const template = document.getElementById('signature-template');

  const updateForm = () => {
    const count = Math.min(parseInt(countInput.value, 10) || 1, 4);
    form.innerHTML = '';
    form.style.display = 'flex';

    for (let i = 0; i < count; i++) {
      const clone = template.content.cloneNode(true);
      form.appendChild(clone);
    }
  };

  showButton.addEventListener('click', updateForm);
  countInput.addEventListener('input', updateForm); // 👈 přidá dynamické vykreslení
};

export default signatureForm;
