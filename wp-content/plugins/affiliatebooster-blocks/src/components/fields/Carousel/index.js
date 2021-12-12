
const { Component, cloneElement, Fragment, findDOMNode } = wp.element
import { _equal } from './utils'

const defaultOptions = {
    margin: 10,
    nav: false,
    dots: false,
    center: false,
    autoplay: false,
    dot_indicator: false,
    items: { md: '2', sm: '2', xs: '1' }
}

export default class Carousel extends Component {
    constructor(props) {
        super(props)
        this.state = { device: '' }
    }
    componentDidMount() {
        let activeDevice = this.parseResponsiveViewPort()
        this.setState({ device: activeDevice })
        require('./affiliateCarousel')
        this.init(this.getOptions())
    }
    componentWillReceiveProps(nextProps) {
        this.destroy()
    }

    componentDidUpdate(prevProps, prevState) {
        if (!_equal(prevProps.options, this.props.options) || prevProps.children.length !== this.props.children.length) {
            this.init(this.getOptions());
        }
    }

    componentWillUnmount() {
        this.destroy();
    }

    parseResponsiveViewPort = () => {
        const { options: { responsive } } = this.props
        if (typeof responsive === 'undefined')
            return
        let activeView = null

        for (let i = 0; i < responsive.length; i++) {
            if (window.innerWidth > responsive[i].viewport) {
                activeView = responsive[i]
                break;
            }
        }
        if (activeView === null) {
            activeView = responsive[responsive.length - 1]
        }
        return activeView.viewport <= 1199 ? activeView.viewport <= 991 ? 'xs' : 'sm' : 'md'
    }

    init(options) {
        this.$node.affiliateCarousel(options)
        this.$affiliateCarousel = this.$node.data('affiliateCarousel')
    }

    getOptions() {
        const { options } = this.props
        const newOptions = Object.assign(defaultOptions, options)
        return newOptions
    }

    destroy() {
        this.$affiliateCarousel.destroy();
    }

    cloneItems() {
        const { children, options } = this.props
        let device = this.parseResponsiveViewPort()
        let firstChilds = []
        let lastChilds = []

        const cloneItems = children.length > options.items[device] ? Math.ceil(children.length / 2) : options.items[device]
        Array(parseInt(cloneItems)).fill(0).map((_, i) => {
            const lastChild = cloneElement(children[(children.length - 1) - i], { className: `clone affiliate-carousel-item` })
            const firstChild = cloneElement(children[i], { className: `clone affiliate-carousel-item` })
            firstChilds.push(firstChild)
            lastChilds.push(lastChild)
        })
        return { firstChilds, lastChilds }
    }

    finddotLength = () => {
        const { options: { items } } = this.props
        let device = this.parseResponsiveViewPort()
        const cloneItems = $('.affiliate-carousel-extended-outer-stage').find('.clone').length
        let numberOfItems = $('.affiliate-carousel-extended-outer-stage').find('.affiliate-carousel-item').length - cloneItems
        return (Math.floor(numberOfItems / items[device]))
    }

    createDotsItems() {
        const { children, options: { items } } = this.props
        let device = this.parseResponsiveViewPort()
        let dots = Math.floor(children.length / items[device]);
        return Array(dots).fill(0).map((item, index) => {
            return (
                <li className={`affiliate-carousel-dot-${index}${index === 0 ? ' active' : ''}`}>
                    <span className="dot-indicator"/>
                </li>
            )
        })
    }

    render() {
        const { options: { nav, dots, arrowStyle, arrowPosition }, children } = this.props
        const cloneItems = this.cloneItems()
        return (
            <div className={`affiliate-carousel affiliate-carousel-wrapper`} ref={(item) => this.$node = $(findDOMNode(item))} {...this.props.options}>
                <div className="affiliate-carousel-extended-list">
                    <div className="affiliate-carousel-extended-outer-stage">
                        {cloneItems.lastChilds}
                        {children}
                        {cloneItems.firstChilds}
                    </div>
                </div>
                <div className="affiliate-carousel-nav-control">
                    {nav &&
                        <Fragment>
                            <span className={`next-control nav-control ${arrowPosition}`} onClick={() => this.$affiliateCarousel.navigate('next')}>
                                {(arrowStyle == 'arrowright2') ? <span className={`fas fa-angle-right`} /> : <span className={`fas fa-arrow-right`} />}
                            </span>
                            <span className={`prev-control nav-control ${arrowPosition}`} onClick={() => this.$affiliateCarousel.navigate('prev')}>
                                {(arrowStyle == 'arrowright2') ? <span className={`fas fa-angle-left`} /> : <span className={`fas fa-arrow-left`}/>}
                            </span>
                        </Fragment>
                    }
                </div>
                {dots &&
                    <div className="affiliate-carousel-dots">
                        <ul >
                            {this.createDotsItems()}
                        </ul>
                    </div>
                }
            </div>
        )
    }
}