console.clear()

const data = [
  'Doliprane',
  'Atacand',
  'Aspirine',
  'Banana',
  'Beets',
  'Bell pepper',
  'Broccoli',
  'Brussels sprout',
  'Cabbage',
  'Carrot',
  'Cauliflower',
  'Celery',
  'Chard',
  'Chicory',
  'Corn',
  'Cucumber',
  'Daikon',
  'Date',
  'Edamame',
  'Eggplant',
  'Elderberry',
  'Fennel',
  'Fig',
  'Garlic',
  'Grape',
  'Honeydew melon',
  'Iceberg lettuce',
  'Jerusalem artichoke',
  'Kale',
  'Kiwi',
  'Leek',
  'Lemon',
  'Mango',
  'Mangosteen',
  'Melon',
  'Mushroom',
  'Nectarine',
  'Okra',
  'Olive',
  'Onion',
  'Orange',
  'Parship',
  'Pea',
  'Pear',
  'Pineapple',
  'Potato',
  'Pumpkin',
  'Quince',
  'Radish',
  'Rhubarb',
  'Shallot',
  'Spinach',
  'Squash',
  'Strawberry',
  'Sweet potato',
  'Tomato',
  'Turnip',
  'Ugli fruit',
  'Victoria plum',
  'Watercress',
  'Watermelon',
  'Yam',
  'Zucchini'
]

class Autocomplete {
  constructor({
    rootNode,
    inputNode,
    resultsNode,
    searchFn,
    shouldAutoSelect = false,
    onShow = () => {},
    onHide = () => {}
  } = {}) {
    this.rootNode = rootNode
    this.inputNode = inputNode
    this.resultsNode = resultsNode
    this.searchFn = searchFn
    this.shouldAutoSelect = shouldAutoSelect
    this.onShow = onShow
    this.onHide = onHide
    this.activeIndex = -1
    this.value = ''
    this.resultsCount = 0
    this.showResults = false
    this.hasInlineAutocomplete = this.inputNode.getAttribute('aria-autocomplete') === 'both'

    // Bind this
    this.handleDocumentClick = this.handleDocumentClick.bind(this)
    this.handleInput = this.handleInput.bind(this)
    this.handleKeydown = this.handleKeydown.bind(this)
    this.handleFocus = this.handleFocus.bind(this)
    this.handleResultClick = this.handleResultClick.bind(this)
    this.getItemAt = this.getItemAt.bind(this)
    this.selectItem = this.selectItem.bind(this)
    this.checkSelection = this.checkSelection.bind(this)
    this.autocompleteItem = this.autocompleteItem.bind(this)
    this.updateResults = this.updateResults.bind(this)
    this.hideResults = this.hideResults.bind(this)

    // Setup events
    document.body.addEventListener('click', this.handleDocumentClick)
    this.inputNode.addEventListener('input', this.handleInput)
    this.inputNode.addEventListener('keydown', this.handleKeydown)
    this.inputNode.addEventListener('focus', this.handleFocus)
    this.resultsNode.addEventListener('click', this.handleResultClick)
  }

  handleDocumentClick(event) {
    if (event.target === this.inputNode || this.rootNode.contains(event.target)) {
      return
    }
    this.hideResults()
  }

  handleInput(event) {
    const value = event.target.value
    console.log('handleInput', this.value, '->', value)
    this.updateResults()
    if (value.length > this.value.length && this.hasInlineAutocomplete) {
      this.autocompleteItem()
    }
    this.value = value
  }

  //   handleKeyup = event => {
  //     const key = event.key || event.keyCode
  //     console.log('handleKeyup', key)

  //     switch (key) {
  //       case 'ArrowUp':
  //       case 'ArrowDown':
  //       case 'Escape':
  //       case 'Enter':
  //         event.preventDefault()
  //         return
  //       default:
  //         this.updateResults()
  //     }

  //     if (this.hasInlineAutocomplete) {
  //       switch(key) {
  //         case 'Backspace':
  //           return
  //         default:
  //           this.autocompleteItem()
  //       }
  //     }
  //   }

  handleKeydown(event) {
    const key = event.key || event.keyCode
    console.log('handleKeydown', key)
    let activeIndex = this.activeIndex

    if (key === 'Escape') {
      this.hideResults()
      this.inputNode.value = ''
      this.value = ''
      return
    }

    if (this.resultsCount < 1) {
      if (this.hasInlineAutocomplete && (key === 'ArrowDown' || key === 'ArrowUp')) {
        this.updateResults()
      } else {
        return
      }
    }

    const prevActive = this.getItemAt(activeIndex)
    let activeItem

    switch (key) {
      case 'ArrowUp':
        if (activeIndex <= 0) {
          activeIndex = this.resultsCount - 1
        } else {
          activeIndex -= 1
        }
        break
      case 'ArrowDown':
        if (activeIndex === -1 || activeIndex >= this.resultsCount - 1) {
          activeIndex = 0
        } else {
          activeIndex += 1
        }
        break
      case 'Enter':
        activeItem = this.getItemAt(activeIndex)
        this.selectItem(activeItem)
        return
      case 'Tab':
        this.checkSelection()
        this.hideResults()
        return
      default:
        return
    }

    event.preventDefault()
    activeItem = this.getItemAt(activeIndex)
    this.activeIndex = activeIndex

    if (prevActive) {
      prevActive.classList.remove('selected')
      prevActive.setAttribute('aria-selected', 'false')
    }

    if (activeItem) {
      this.inputNode.setAttribute('aria-activedescendant', `autocomplete-result-${activeIndex}`)
      activeItem.classList.add('selected')
      activeItem.setAttribute('aria-selected', 'true')
      if (this.hasInlineAutocomplete) {
        this.inputNode.value = activeItem.innerText
        this.value = activeItem.innerText
      }
    } else {
      this.inputNode.setAttribute('aria-activedescendant', '')
    }
  }

  handleFocus(event) {
    this.updateResults()
  }

  handleResultClick(event) {
    if (event.target && event.target.nodeName === 'LI') {
      this.selectItem(event.target)
    }
  }

  getItemAt(index) {
    return this.resultsNode.querySelector(`#autocomplete-result-${index}`)
  }

  selectItem(node) {
    if (node) {
      this.inputNode.value = node.innerText
      this.value = node.innerText
      this.hideResults()
    }
  }

  checkSelection() {
    if (this.activeIndex < 0) {
      return
    }
    const activeItem = this.getItemAt(this.activeIndex)
    this.selectItem(activeItem)
  }

  autocompleteItem(event) {
    const autocompletedItem = this.resultsNode.querySelector('.selected')
    const input = this.inputNode.value
    if (!autocompletedItem || !input) {
      return
    }

    const autocomplete = autocompletedItem.innerText
    if (input !== autocomplete) {
      this.inputNode.value = autocomplete
      this.value = autocomplete
      this.inputNode.setSelectionRange(input.length, autocomplete.length)
    }
  }

  updateResults() {
    const input = this.inputNode.value
    const results = this.searchFn(input)

    this.hideResults()
    if (results.length === 0) {
      return
    }

    this.resultsNode.innerHTML = results.map((result, index) => {
      const isSelected = this.shouldAutoSelect && index === 0
      if (isSelected) {
        this.activeIndex = 0
      }
      return `
        <li
          id='autocomplete-result-${index}'
          class='autocomplete-result${isSelected ? ' selected' : ''}'
          role='option'
          ${isSelected ? "aria-selected='true'" : ''}
        >
          ${result}
        </li>
      `
    }).join('')

    this.resultsNode.classList.remove('hidden')
    this.rootNode.setAttribute('aria-expanded', true)
    this.resultsCount = results.length
    this.shown = true
    this.onShow()
  }

  hideResults() {
    this.shown = false
    this.activeIndex = -1
    this.resultsNode.innerHTML = ''
    this.resultsNode.classList.add('hidden')
    this.rootNode.setAttribute('aria-expanded', 'false')
    this.resultsCount = 0
    this.inputNode.setAttribute('aria-activedescendant', '')
    this.onHide()
  }
}

const search = input => {
  if (input.length < 1) {
    return []
  }
  return data.filter(item => item.toLowerCase().startsWith(input.toLowerCase()))
}

const autocomplete = new Autocomplete({
  rootNode: document.querySelector('.autocomplete'),
  inputNode: document.querySelector('.autocomplete-input'),
  resultsNode: document.querySelector('.autocomplete-results'),
  searchFn: search,
  shouldAutoSelect: true
})

document.querySelector('form').addEventListener('submit', (event) => {
  event.preventDefault()
  const result = document.querySelector('.search-result')
  const nom = document.querySelector('.nom')
  const presentation = document.querySelector('.presentation')
  const prix = document.querySelector('.prix')
  const input = document.querySelector('.autocomplete-input')
  result.innerHTML = 'Recherche: ' + input.value
  nom.innerHTML = input.value
  presentation.innerHTML = 'Boite de 16 comprimé'
  prix.innerHTML = '120'
  $([document.documentElement, document.body]).animate({
    scrollTop: $(".details").offset().top - 100
  }, 1000);
})