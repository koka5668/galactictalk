const trigger = document.querySelector('.js-menu-trigger')
const container = document.querySelector('.js-hamburger-container')
const backdrop = document.querySelector('.js-backdrop')


trigger?.addEventListener('click', () => {
  const currentState = container?.getAttribute('aria-hidden') === 'true';
  container?.setAttribute('aria-hidden', (!currentState).toString());
  backdrop?.classList.toggle('hidden');
});

backdrop?.addEventListener('click', () => {
  container?.setAttribute('aria-hidden', 'true');
  backdrop?.classList.add('hidden');
});
