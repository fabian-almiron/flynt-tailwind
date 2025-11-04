export default function (el) {
  const accordionItems = el.querySelectorAll('[data-accordion-item]')

  if (!accordionItems || accordionItems.length === 0) {
    return
  }

  accordionItems.forEach(item => {
    const trigger = item.querySelector('[data-accordion-trigger]')
    const content = item.querySelector('[data-accordion-content]')

    if (!trigger || !content) {
      return
    }

    trigger.addEventListener('click', () => {
      const isOpen = item.classList.contains('is-open')

      if (isOpen) {
        closeItem(item, trigger)
      } else {
        openItem(item, trigger)
      }
    })
  })

  function openItem (item, trigger) {
    item.classList.add('is-open')
    trigger.setAttribute('aria-expanded', 'true')
  }

  function closeItem (item, trigger) {
    item.classList.remove('is-open')
    trigger.setAttribute('aria-expanded', 'false')
  }
}

