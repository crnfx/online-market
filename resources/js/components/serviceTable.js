export function initServiceTables() {
  const tables = document.querySelectorAll('.service__table');

  if (tables.length === 0) return;

  tables.forEach((table, index) => {
    const head = table.querySelector('.service__head');
    const body = table.querySelector('tbody');

    if (!head || !body) return;

    if (index === 0) {
      head.classList.remove('collapsed');
      body.classList.remove('collapsed');
      head.setAttribute('aria-expanded', 'true');
    } else {
      head.classList.add('collapsed');
      body.classList.add('collapsed');
      head.setAttribute('aria-expanded', 'false');
    }

    head.addEventListener('click', () => {
      toggleTable(head, body);
    });

    head.addEventListener('keydown', (e) => {
      if (e.key === 'Enter' || e.key === ' ') {
        e.preventDefault();
        toggleTable(head, body);
      }
    });
  });
}

function toggleTable(head, body) {
  const isExpanded = head.getAttribute('aria-expanded') === 'true';
  head.classList.toggle('collapsed');
  body.classList.toggle('collapsed');
  head.setAttribute('aria-expanded', !isExpanded);
}
