export default function (el) {
  const refs = {
    megaMenu: el.querySelector('[data-mega-menu]'),
    menuLinks: el.querySelectorAll('.menu .link'),
    megaMenuDropdowns: el.querySelectorAll('.megaMenu__dropdown'),
    nestedMenuItems: el.querySelectorAll('.menu .item.has-children'),
    submenus: el.querySelectorAll('.submenu')
  }

  // Initialize the component
  if (refs.megaMenu) {
    setupMegaMenu(el, refs)
  }
  setupNestedMenus(el, refs)

  // Return cleanup function
  return () => {
    // Cleanup event listeners if needed
  }
}

function setupNestedMenus (el, refs) {
  // Handle traditional nested menu items
  refs.nestedMenuItems.forEach(item => {
    const link = item.querySelector('.link')
    const submenu = item.querySelector('.submenu')

    if (!link || !submenu) return

    // Don't add nested menu behavior if this item has a mega menu
    if (link.getAttribute('data-has-mega-menu') === 'true') return

    let hoverTimeout

    // Mouse events for hover behavior
    item.addEventListener('mouseenter', () => {
      clearTimeout(hoverTimeout)
      showSubmenu(submenu, item, refs)
    })

    item.addEventListener('mouseleave', () => {
      hoverTimeout = setTimeout(() => {
        hideSubmenu(submenu, item)
      }, 100)
    })

    // Keyboard navigation
    link.addEventListener('keydown', (e) => {
      if (e.key === 'ArrowDown') {
        e.preventDefault()
        showSubmenu(submenu, item, refs)
        const firstSubmenuLink = submenu.querySelector('.submenu-link')
        if (firstSubmenuLink) firstSubmenuLink.focus()
      }
      if (e.key === 'Escape') {
        hideSubmenu(submenu, item)
        link.focus()
      }
    })

    // Handle submenu keyboard navigation
    const submenuLinks = submenu.querySelectorAll('.submenu-link')
    submenuLinks.forEach((submenuLink, index) => {
      submenuLink.addEventListener('keydown', (e) => {
        if (e.key === 'ArrowUp') {
          e.preventDefault()
          if (index === 0) {
            link.focus()
          } else {
            submenuLinks[index - 1].focus()
          }
        }
        if (e.key === 'ArrowDown') {
          e.preventDefault()
          if (index < submenuLinks.length - 1) {
            submenuLinks[index + 1].focus()
          }
        }
        if (e.key === 'Escape') {
          hideSubmenu(submenu, item)
          link.focus()
        }
      })
    })
  })
}

function setupMegaMenu (el, refs) {
  // Add data attributes to menu links that have mega menus
  refs.menuLinks.forEach(link => {
    const linkText = link.textContent.trim()

    const hasDropdown = Array.from(refs.megaMenuDropdowns).some(dropdown => {
      const trigger = dropdown.getAttribute('data-trigger')
      return trigger === linkText.toLowerCase().replace(/\s+/g, '-')
    })

    if (hasDropdown) {
      link.setAttribute('data-has-mega-menu', 'true')
      addMegaMenuEvents(el, refs, link, linkText)
    }
  })
}

function addMegaMenuEvents (el, refs, link, linkText) {
  const trigger = linkText.toLowerCase().replace(/\s+/g, '-')
  const dropdown = el.querySelector(`[data-trigger="${trigger}"]`)

  if (!dropdown) return

  let hoverTimeout

  // Mouse enter on menu link
  link.addEventListener('mouseenter', () => {
    clearTimeout(hoverTimeout)
    showMegaMenu(refs, dropdown, link)
  })

  // Mouse leave on menu link
  link.addEventListener('mouseleave', () => {
    hoverTimeout = setTimeout(() => {
      hideMegaMenu(refs, dropdown, link)
    }, 100)
  })

  // Mouse enter on dropdown
  dropdown.addEventListener('mouseenter', () => {
    clearTimeout(hoverTimeout)
  })

  // Mouse leave on dropdown
  dropdown.addEventListener('mouseleave', () => {
    hideMegaMenu(refs, dropdown, link)
  })

  // Keyboard navigation
  link.addEventListener('keydown', (e) => {
    if (e.key === 'Enter' || e.key === ' ') {
      e.preventDefault()
      toggleMegaMenu(refs, dropdown, link)
    }
    if (e.key === 'Escape') {
      hideMegaMenu(refs, dropdown, link)
    }
  })

  // Click to prevent default link behavior when mega menu is present
  link.addEventListener('click', (e) => {
    if (link.getAttribute('data-has-mega-menu') === 'true') {
      e.preventDefault()
    }
  })
}

function showMegaMenu (refs, dropdown, link) {
  // Hide all other mega menus first
  hideAllMegaMenus(refs)

  // Show the target mega menu
  dropdown.classList.add('is-visible')
  link.classList.add('is-mega-menu-active')

  // Add body class to prevent scrolling if needed
  document.body.classList.add('mega-menu-open')
}

function hideMegaMenu (refs, dropdown, link) {
  dropdown.classList.remove('is-visible')
  link.classList.remove('is-mega-menu-active')
  document.body.classList.remove('mega-menu-open')
}

function hideAllMegaMenus (refs) {
  refs.megaMenuDropdowns.forEach(dropdown => {
    dropdown.classList.remove('is-visible')
  })
  refs.menuLinks.forEach(link => {
    link.classList.remove('is-mega-menu-active')
  })
  document.body.classList.remove('mega-menu-open')
}

function toggleMegaMenu (refs, dropdown, link) {
  if (dropdown.classList.contains('is-visible')) {
    hideMegaMenu(refs, dropdown, link)
  } else {
    showMegaMenu(refs, dropdown, link)
  }
}

function showSubmenu (submenu, item, refs) {
  // Hide all other submenus first
  hideAllSubmenus(refs)

  // Show the target submenu
  submenu.classList.add('is-visible')
  item.classList.add('is-submenu-active')
}

function hideSubmenu (submenu, item) {
  submenu.classList.remove('is-visible')
  item.classList.remove('is-submenu-active')
}

function hideAllSubmenus (refs) {
  refs.submenus.forEach(submenu => {
    submenu.classList.remove('is-visible')
  })
  refs.nestedMenuItems.forEach(item => {
    item.classList.remove('is-submenu-active')
  })
}
