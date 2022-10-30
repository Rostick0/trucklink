class Calendar {
    constructor(calendarHtml, buttonShow) {
        this.calendarHtml = calendarHtml;
        this.monthHtml = calendarHtml.querySelector('.calendar__month_text');
        this.calendarMonthLeft = calendarHtml.querySelector('.calendar__month_left');
        this.calendarMonthRight = calendarHtml.querySelector('.calendar__month_right');
        this.daysHtml = calendarHtml.querySelectorAll('.calendar__day_item');
        this.inputHtml = buttonShow.querySelector('.input');
        this.buttonShow = buttonShow;
        this.day = new Date().getDate();
        this.months = ['Январь', 'Февраль', 'Март', 'Апрель', 'Май', 'Июнь', 'Июль', 'Август', 'Сентябрь', 'Октябрь', 'Ноябрь', 'Декабрь'];
        this.month = new Date().getMonth();
        this.year = new Date().getFullYear();
        this.today = new Date(`${new Date().getMonth()} ${new Date().getDate()} ${new Date().getFullYear()}`)
        this.monthShort = [
            'янв',
            'фев',
            'мар',
            'апр',
            'май',
            'июн',
            'июл',
            'авг',
            'сен',
            'окт',
            'ноя',
            'дек'
        ];
        this.previousDays = false;
    }

    setAnimation(elem, determinantProperty, showProperty = 'd-flex', hideProperty = '_hide', duration = 500) {
        if (elem.classList.contains(determinantProperty)) {
            return;
        }

        elem.classList.add(showProperty);
        elem.classList.add(hideProperty);

        setTimeout(() => {
            if (elem.classList.contains(determinantProperty)) {
                return;
            }

            elem.classList.remove(showProperty);
            elem.classList.remove(hideProperty);
        }, duration);
    }

    render() {
        this.monthHtml.textContent = this.months[this.month];

        this.days();
    }

    decrementMonth() {
        this.calendarMonthLeft.addEventListener('click', () => {
            this.month -= 1;

            if (this.month < 0) {
                this.year -= 1
                this.month = 11;
            }

            this.render();
        });
    }

    incrementMonth() {
        this.calendarMonthRight.addEventListener('click', () => {
            this.month += 1;
            if (this.month > 11) {
                this.year += 1
                this.month = 0;
            }

            this.render();
        });
    }

    removeClass(elem, classCss) {
        if (elem.classList.contains(classCss)) {
            elem.classList.remove(classCss);
        }
    }

    setInput = (day, disabled) => {
        if (!disabled) return;

        this.day = day;
        this.inputHtml.value = `${day} ${this.monthShort[this.month]} ${this.year}`;
        this.removeClass(this.calendarHtml, 'display-block');
        return this.render();
    }

    show() {
        return this.buttonShow.addEventListener('click', () => {
            this.calendarHtml.classList.toggle('display-block');

            this.setAnimation(this.calendarHtml, 'display-block', 'd-block');
        })
    }

    setPreviousDays(value) {
        this.previousDays = value;
    }

    days() {
        if (!this.daysHtml) {
            return;
        }

        let disabled = true;
        let firstOne = true;

        for (let i = 0; i < this.daysHtml.length; i++) {
            let day = new Date(this.year, this.month, 1).getDay();

            if (day === 0) day += 7;

            let date = new Date(this.year, this.month, i - day + 2)

            this.daysHtml[i].textContent = date.getDate();

            removeClass(this.daysHtml[i], '_disabled');
            removeClass(this.daysHtml[i], '_active');

            if (this.day == this.daysHtml[i].textContent && this.month === new Date().getMonth() && this.year === new Date().getFullYear()) this.daysHtml[i].classList.add('_active');

            if (+this.daysHtml[i].textContent === 1) disabled = false;

            if (!disabled && firstOne && +this.daysHtml[i].textContent > 1) firstOne = false;

            if (this.daysHtml[i - 1] && +this.daysHtml[i - 1].textContent >= +this.daysHtml[i].textContent && !firstOne) disabled = true;

            if (disabled) this.daysHtml[i].classList.add('_disabled');
            else if (!this.previousDays) {
                if (this.today > new Date(`${this.month} ${this.daysHtml[i].textContent} ${this.year}`)) this.daysHtml[i].classList.add('_disabled');
            }

            this.daysHtml[i].onclick = () => {
                this.setInput(this.daysHtml[i].textContent, !this.daysHtml[i].classList.contains('_disabled'));
                this.setAnimation(this.calendarHtml, 'display-block', 'd-block');
            }
        }
    }

    start() {
        this.render();

        this.decrementMonth();
        this.incrementMonth();

        this.show();
    }
}

const calendarFirst = document.querySelector('.calendar');
const calendarFromActive = document.querySelector('.calendar-from__active');


if (calendarFirst) {
    const calendarStart = new Calendar(calendarFirst, calendarFromActive);
    calendarStart.start();
}