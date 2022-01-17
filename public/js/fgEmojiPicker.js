/*

// Usage
FgEmojiPicker.init({
    trigger: 'button',
    position: ['bottom', 'right'],
    dir: 'directory/to/json', (without json name)
    preFetch: true, //load emoji json when function called 
    emit(emoji) {
        console.log(emoji);
    }
});
*/

const FgEmojiPicker = function (options) {

    this.options = options;
    this.emojiJson = null;

    if (!this.options) {
        return console.error('You must provide object as a first argument')
    }

    this.init = () => {

        // Generate style
        this.functions.generateStyle.call(this);

        this.selectors.trigger = this.options.hasOwnProperty('trigger') ? this.options.trigger : console.error('You must proved trigger element like this - \'EmojiPicker.init({trigger: "selector"})\' ');
        this.selectors.search = '.fg-emoji-picker-search input';
        this.selectors.emojiContainer = '.fg-emoji-picker-grid'
        this.emojiItems = undefined;
        this.variable.emit = this.options.emit || null;
        this.variable.position = this.options.position || null;
        this.variable.dir = this.options.dir || '';
        this.insertInto = this.options.insertInto || undefined;
        if (!this.selectors.trigger) return;

        this.bindEvents();
        this.options && this.options.preFetch && this.functions.fetchEmojiData();
    }

    this.lib = (el = undefined) => {
        return {
            el: document.querySelectorAll(el),
            on(event, callback, classList = undefined) {
                if (!classList) {
                    this.el.forEach(item => {
                        item.addEventListener(event, callback.bind(item))
                    })
                } else {
                    this.el.forEach(item => {
                        item.addEventListener(event, (e) => {
                            if (e.target.closest(classList)) {
                                callback.call(e.target.closest(classList), e)
                            }
                        })
                    })
                }
            }
        }
    },

    this.variable = {
        position: null,
        dir: '',
        categoryIcons: {
            'smileys--people': '<svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.828 14.828a4 4 0 01-5.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>',
            'animals--nature': '<svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>',
            'travel--places': '<svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" /></svg>',
            'activities': '<svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 11.5V14m0-2.5v-6a1.5 1.5 0 113 0m-3 6a1.5 1.5 0 00-3 0v2a7.5 7.5 0 0015 0v-5a1.5 1.5 0 00-3 0m-6-3V11m0-5.5v-1a1.5 1.5 0 013 0v1m0 0V11m0-5.5a1.5 1.5 0 013 0v3m0 0V11" /></svg>',
            'objects': '<svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v13m0-13V6a2 2 0 112 2h-2zm0 0V5.5A2.5 2.5 0 109.5 8H12zm-7 4h14M5 12a2 2 0 110-4h14a2 2 0 110 4M5 12v7a2 2 0 002 2h10a2 2 0 002-2v-7" /></svg>',
            'symbols': '<svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" /></svg>',
            'flags': '<svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 21v-4m0 0V5a2 2 0 012-2h6.5l1 1H21l-3 6 3 6h-8.5l-1-1H5a2 2 0 00-2 2zm9-13.5V9" /></svg>',
            'search': '',
        }
    }

    this.selectors = {
        emit: null,
        trigger: null,
        emojiPicker: '.fg-emoji-picker',
        emojiFooter: '.fg-emoji-picker-footer',
        emojiBody: '.fg-emoji-picker-all-categories',
        emojiHeader: '.fg-emoji-picker-categories'
    }

    this.bindEvents = () => {
        this.lib('body').on('click', this.functions.removeEmojiPicker.bind(this));
        this.lib('body').on('click', this.functions.emitEmoji.bind(this));
        this.lib('body').on('click', this.functions.openEmojiSelector.bind(this), this.selectors.trigger);
        this.lib('body').on('input', this.functions.search.bind(this), this.selectors.search);
        this.lib('body').on('keydown', this.functions.removeEmojiPicker.bind(this));
        window.addEventListener('keydown', e => {
            if (e.keyCode === 27) {
                if (document.querySelector(this.selectors.emojiPicker)) {
                    document.querySelectorAll(this.selectors.emojiPicker).forEach(emoji => emoji.remove())
                    this.emojiItems = undefined
                }
            }

        })
    }

    this.html = {
        pickerBody: () => {
            return `
            <div class="fg-emoji-picker">
                <div style="position: absolute; left: 0; top: 0; width: 100%; height: 100%; display: flex; justify-content: center; align-items: center;">
                    <div>
                        <div class="sk-chase">
                            <div class="sk-chase-dot"></div>
                            <div class="sk-chase-dot"></div>
                            <div class="sk-chase-dot"></div>
                            <div class="sk-chase-dot"></div>
                            <div class="sk-chase-dot"></div>
                            <div class="sk-chase-dot"></div>
                        </div>
                    </div>
                </div>
            </div>`;
        }
    }

    this.destroy = () => {
        document.querySelectorAll(this.selectors.emojiPicker).forEach(p => p.remove())
        this.emojiItems = undefined;
        return true;
    }

    setCaretPosition = (field, caretPos) => {
		var elem = field
		if (elem != null) {
			if (elem.createTextRange) {
				var range = elem.createTextRange();
				range.move('character', caretPos);
				range.select();
			} else {
				if (elem.selectionStart) {
					elem.focus();
					elem.setSelectionRange(caretPos, caretPos);
				} else {
					elem.focus();
                }
			}
		}
	}

    this.functions = {

        // Put in place 
        putInPlace(myField, myValue) {
            if (document.selection) {
                myField.focus();
                sel = document.selection.createRange();
                sel.text = myValue;
            } else if (myField.selectionStart || myField.selectionStart == "0") {
                const startPos = myField.selectionStart;
                const endPos = myField.selectionEnd;
                myField.value = myField.value.substring(0, startPos) + myValue + myField.value.substring(endPos, myField.value.length);
                
                setCaretPosition(myField, startPos + 2)
                
            } else {
                myField.value += myValue;
                myField.focus()
            }
        },

        // Search
        search(e) {
            const val = e.target.value;
            if (!Array.isArray(this.emojiItems)) {
                this.emojiItems = Array.from(e.target.closest(this.selectors.emojiPicker).querySelectorAll(`${this.selectors.emojiBody} li`));
            }
            this.emojiItems.filter(emoji => {
                if (!emoji.getAttribute('data-name').match(val)) {
                    emoji.style.display = 'none'
                } else {
                    emoji.style.display = ''
                }
            })

            if (!val.length) this.emojiItems = undefined;
        },


        fetchEmojiData: () => {
            fetch(`/public/js/full-emoji-list.json`)
                .then(response => response.json())
                .then(object => { this.emojiJson = object });
        },

        generateStyle() {
            document.head.insertAdjacentHTML('beforeend', `
                <style>
                .sk-chase {
                    width: 40px;
                    height: 40px;
                    position: relative;
                    animation: sk-chase 2.5s infinite linear both;
                  }
                  
                  .sk-chase-dot {
                    width: 100%;
                    height: 100%;
                    position: absolute;
                    left: 0;
                    top: 0; 
                    animation: sk-chase-dot 2.0s infinite ease-in-out both; 
                  }
                  
                  .sk-chase-dot:before {
                    content: '';
                    display: block;
                    width: 25%;
                    height: 25%;
                    background-color: #9fa1a5;
                    border-radius: 100%;
                    animation: sk-chase-dot-before 2.0s infinite ease-in-out both; 
                  }
                  
                  .sk-chase-dot:nth-child(1) { animation-delay: -1.1s; }
                  .sk-chase-dot:nth-child(2) { animation-delay: -1.0s; }
                  .sk-chase-dot:nth-child(3) { animation-delay: -0.9s; }
                  .sk-chase-dot:nth-child(4) { animation-delay: -0.8s; }
                  .sk-chase-dot:nth-child(5) { animation-delay: -0.7s; }
                  .sk-chase-dot:nth-child(6) { animation-delay: -0.6s; }
                  .sk-chase-dot:nth-child(1):before { animation-delay: -1.1s; }
                  .sk-chase-dot:nth-child(2):before { animation-delay: -1.0s; }
                  .sk-chase-dot:nth-child(3):before { animation-delay: -0.9s; }
                  .sk-chase-dot:nth-child(4):before { animation-delay: -0.8s; }
                  .sk-chase-dot:nth-child(5):before { animation-delay: -0.7s; }
                  .sk-chase-dot:nth-child(6):before { animation-delay: -0.6s; }
                  
                  @keyframes sk-chase {
                    100% { transform: rotate(360deg); } 
                  }
                  
                  @keyframes sk-chase-dot {
                    80%, 100% { transform: rotate(360deg); } 
                  }
                  
                  @keyframes sk-chase-dot-before {
                    50% {
                      transform: scale(0.4); 
                    } 100%, 0% {
                      transform: scale(1.0); 
                    } 
                  }


                ${this.selectors.emojiPicker} {
                    /* position: fixed; */
                    position: absolute;
                    z-index: 999;
                    width: 300px;
                    min-height: 360px;
                    background-color: white;
                    box-shadow: 0px 2px 13px -2px rgba(0, 0, 0, 0.1803921568627451);
                    border-radius: 4px;
                    overflow: hidden;
                }

                ${this.selectors.emojiPicker} ${this.selectors.emojiBody} {
                    height: 301px;
                    overflow-y: auto;
                    padding: 0 15px 15px 15px;
                }

                ${this.selectors.emojiPicker} .fg-emoji-picker-container-title {
                    color: black;
                    margin: 10px 0;
                }

                ${this.selectors.emojiPicker} * {
                    margin: 0;
                    padding: 0;
                    text-decoration: none;
                    color: #666;
                    font-family: sans-serif;
                }

                ${this.selectors.emojiPicker} ul {
                    list-style: none;
                    margin: 0;
                    padding: 0;
                }

                ${this.selectors.emojiPicker} .fg-emoji-picker-category {
                    margin-top: 1px;
                    padding-top: 15px;
                }

                .fg-emoji-picker-grid {
                    display: flex;
                    flex-wrap: wrap;
                }

                .fg-emoji-picker-grid > li {
                    cursor: pointer;
                    flex: 0 0 calc(100% / 5);
                    max-width: calc(100% / 5);
                    height: 48px;
                    min-width: 0;
                    display: flex;
                    justify-content: center;
                    align-items: center;
                    transition: all .2s ease;
                    background-color: white;
                }

                .fg-emoji-picker-grid > li:hover {
                    background-color: #99c9ef;
                }

                .fg-emoji-picker-grid > li:hover a {
                    -webkit-transform: scale(1.2);
                    -ms-transform: scale(1.2);
                    -moz-transform: scale(1.2);
                    transform: scale(1.2);
                }

                .fg-emoji-picker-grid > li > a {
                    display: block;
                    font-size: 25px;
                    margin: 0;
                    padding: 25px 0px;
                    line-height: 0;
                    -webkit-transition: all .3s ease;
                    -moz-transition: all .3s ease;
                    -ms-transition: all .3s ease;
                    transition: all .3s ease;
                }

                /* FILTERS */
                .fg-emoji-picker-categories {
                    /*padding: 0 15px;*/
                    background: #ececec;
                }

                .fg-emoji-picker-categories ul {
                    display: flex;
                    flex-wrap: wrap;
                }

                .fg-emoji-picker-categories li {
                    flex: 1;
                }

                .fg-emoji-picker-categories li.active {
                    background-color: #99c9ef;
                }

                .fg-emoji-picker-categories a {
                    padding: 12px 7px;
                    display: flex;
                    text-align: center;
                    justify-content: center;
                    align-items: center;
                    transition: all .2s ease;
                }

                .fg-emoji-picker-categories a:hover {
                    background-color: #99c9ef;
                }

                .fg-emoji-picker-search {
                    position: relative;
                    height: 25px;
                }

                .fg-emoji-picker-search input {
                    position: absolute;
                    width: 85%;
                    left: 0;
                    top: 0;
                    border: none;
                    padding: 5px 30px 5px 15px;
                    outline: none;
                    background-color: #dedede;
                    font-size: 12px;
                    color: #616161;
                }

                .fg-emoji-picker-search svg {
                    width: 15px;
                    height: 15px;
                    position: absolute;
                    right: 7px;
                    top: 5px;
                    fill: #333333;
                    pointer-events: none;
                }


                /* FOOTER */
                .fg-emoji-picker-footer {
                    display: flex;
                    flex-wrap: wrap;
                    align-items: center;
                    height: 50px;
                    padding: 0 15px 15px 15px;
                }

                .fg-emoji-picker-footer-icon {
                    font-size: 30px;
                    margin-right: 8px;
                }
            </style>`)
        },

        removeEmojiPicker() {
            const el = window.event.target;
            const picker = document.querySelector(this.selectors.emojiPicker);

            if (!el.closest(this.selectors.emojiPicker)) picker ? picker.remove() : false;
            this.emojiItems = undefined
        },


        emitEmoji(e) {

            const el = e.target;

            if (el.tagName.toLowerCase() == 'a' && el.className.includes('fg-emoji-picker-item')) {
                e.preventDefault();

                let emoji = {
                    emoji: el.getAttribute('href'),
                    code: el.getAttribute('data-code')
                }
                if (this.variable.emit) this.variable.emit(emoji, this.triggerer)
                
                // If insert into option exists
                if (this.insertInto) this.functions.putInPlace(this.insertInto, emoji.emoji)

                const picker = document.querySelector(this.selectors.emojiPicker);
                picker.remove();
            }

        },


        // Open omoji picker
        openEmojiSelector(e) {

            let el = e.target.closest(this.selectors.trigger)
            if (el) {
                e.preventDefault();

                // Bounding rect
                // Trigger position and (trigger) sizes
                let el = e.target.closest(this.selectors.trigger)

                if (typeof this.variable.emit === 'function') this.triggerer = el

                // Insert picker
                const emojiPickerMain = new DOMParser().parseFromString(this.html.pickerBody.apply(this), 'text/html').body.firstElementChild;
                document.body.insertAdjacentElement('afterbegin', emojiPickerMain);

                let positions = {
                    buttonTop: e.pageY,
                    buttonWidth: el.offsetWidth,
                    buttonFromLeft: el.getBoundingClientRect().left,
                    bodyHeight: document.body.offsetHeight,
                    bodyWidth: document.body.offsetWidth,
                    windowScrollPosition: window.pageYOffset,
                    emojiHeight: emojiPickerMain.offsetHeight,
                    emojiWidth: emojiPickerMain.offsetWidth,
                }


                // Element position object
                let position = {
                    top: emojiPickerMain.style.top = positions.buttonTop - positions.emojiHeight,
                    left: emojiPickerMain.style.left = positions.buttonFromLeft - positions.emojiWidth,
                    bottom: emojiPickerMain.style.top = positions.buttonTop,
                    right: emojiPickerMain.style.left = positions.buttonFromLeft + positions.buttonWidth
                }


                // Positioning emoji container top
                if (this.variable.position) {
                    this.variable.position.forEach(elemPos => {

                        if (elemPos === 'right') {
                            emojiPickerMain.style.left = position[elemPos] + 'px';
                        } else if (elemPos === 'bottom') {
                            emojiPickerMain.style.top = position[elemPos] + 'px';
                        } else {
                            emojiPickerMain.style[elemPos] = position[elemPos] + 'px';
                        }
                    })
                }



                // Emoji Picker Promise
                this.emojiPicker().then(emojiPicker => {

                    // Create node from 
                    const node = new DOMParser().parseFromString(emojiPicker, 'text/html').body.firstElementChild;
                    
                    emojiPickerMain.innerHTML = node.innerHTML;

                    const emojiFooter       = emojiPickerMain.querySelector(this.selectors.emojiFooter);
                    const emojiBody         = emojiPickerMain.querySelector(this.selectors.emojiBody)
                    const emojiPickerHeader = emojiPickerMain.querySelector(this.selectors.emojiHeader);

                    emojiPickerMain.querySelector('input').focus();

                    // Add event listener on click
                    document.body.querySelector(this.selectors.emojiPicker).onclick = function (e) {

                        e.preventDefault();

                        let scrollTo = (element, to, duration = 100) => {

                            if (duration <= 0) return;
                            var difference = to - element.scrollTop;
                            var perTick = difference / duration * 10;

                            setTimeout(function () {
                                element.scrollTop = element.scrollTop + perTick;
                                if (element.scrollTop === to) return;
                                scrollTo(element, to, duration - 10);
                            }, 10);
                        }

                        const el = e.target;
                        const filterLlnk = el.closest('a');

                        document.querySelectorAll('.fg-emoji-picker-categories li').forEach(item => item.classList.remove('active'))

                        if (filterLlnk && filterLlnk.closest('li') && filterLlnk.closest('li').getAttribute('data-index')) {

                            let list = filterLlnk.closest('li');
                            list.classList.add('active');
                            let listIndex = list.getAttribute('data-index');

                            scrollTo(emojiBody, emojiBody.querySelector(`#${listIndex}`).offsetTop - emojiPickerHeader.offsetHeight);
                        }
                    }

                })
            }
        }
    },



    // Create emoji container / Builder engine
    this.emojiPicker = () => {

        let picker = `
        <div class="fg-emoji-picker">
            <div class="fg-emoji-picker-categories">%categories%
                <div class="fg-emoji-picker-search">
                    <input placeholder="Search emoji" style="display: none;" />
                    ${this.variable.categoryIcons.search}
                </div>
            </div>
            <div>%pickerContainer%</div>
        </div>`;

            let categories      = '<ul>%categories%</ul>';
            let categoriesInner = ``;
            let outerUl         = `<div class="fg-emoji-picker-all-categories">%outerUL%</div>`;
            let innerLists      = ``;

            let fetchData = null;
            if (this.emojiJson) {
                fetchData = new Promise((resolve, reject) => {
                    let index = 0;
                    // Loop through emoji object
                    let object = this.emojiJson;
                    for (const key in object) {
                        if (object.hasOwnProperty(key)) {

                            // Index count
                            index += 1;
                            let keyToId = key.split(' ').join('-').split('&').join('').toLowerCase();

                            const categories = object[key];
                            categoriesInner += `<li class="${index === 1 ? 'active' : ''}" id="${keyToId}" data-index="${keyToId}"><a href="#${keyToId}">${this.variable.categoryIcons[keyToId]}</a></li>`

                            innerLists += `
                            <ul class="fg-emoji-picker-category ${index === 1 ? 'active' : ''}" id="${keyToId}" category-name="${key}">
                                <div class="fg-emoji-picker-container-title">${key}</div>
                                <div class="fg-emoji-picker-grid">`;

                                    // Loop through emoji items
                                    categories.forEach(item => {
                                        innerLists += `<li data-name="${item.description.toLowerCase()}"><a class="fg-emoji-picker-item" title="${item.description}" data-name="${item.description.toLowerCase()}" data-code="${item.code}" href="${item.emoji}">${item.emoji}</a></li>`;
                                    });
                                    innerLists += `
                                </div>
                            </ul>`;
                        }
                    }
                    let allSmiles = outerUl.replace('%outerUL%', innerLists)
                    let cats = categories.replace('%categories%', categoriesInner);
                    let pickerContainer = picker.replace('%pickerContainer%', allSmiles)
                    let data = pickerContainer.replace('%categories%', cats);
                    resolve(data);
                });
            } else {
                fetchData = fetch(`${this.variable.dir}full-emoji-list.json`)
                    .then(response => response.json())
                    .then(object => {

                        // Index count
                        let index = 0;
                        this.emojiJson = object;

                        // Loop through emoji object
                        for (const key in object) {
                            if (object.hasOwnProperty(key)) {

                                // Index count
                                index += 1;

                                let keyToId = key.split(' ').join('-').split('&').join('').toLowerCase();

                                const categories = object[key];
                                categoriesInner += `<li class="${index === 1 ? 'active' : ''}" id="${keyToId}" data-index="${keyToId}"><a href="#${keyToId}">${this.variable.categoryIcons[keyToId]}</a></li>`

                                innerLists += `
                                <ul class="fg-emoji-picker-category ${index === 1 ? 'active' : ''}" id="${keyToId}" category-name="${key}">
                                    <div class="fg-emoji-picker-container-title">${key}</div>
                                    <div class="fg-emoji-picker-grid">`;

                                        // Loop through emoji items
                                        categories.forEach(item => {
                                            innerLists += `<li data-name="${item.description.toLowerCase()}"><a class="fg-emoji-picker-item" title="${item.description}" data-name="${item.description.toLowerCase()}" data-code="${item.code}" href="${item.emoji}">${item.emoji}</a></li>`;
                                        })

                                        innerLists += `
                                    </div>
                                </ul>`;
                            }
                        }


                        let allSmiles = outerUl.replace('%outerUL%', innerLists)
                        let cats = categories.replace('%categories%', categoriesInner);
                        let pickerContainer = picker.replace('%pickerContainer%', allSmiles)
                        let data = pickerContainer.replace('%categories%', cats);
                        return data;
                    })
            }

            return fetchData;
        }

    this.init();

}