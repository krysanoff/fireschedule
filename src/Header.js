import React, {Component} from 'react'

class Header extends Component {
    render() {
        return (
            <header className="bg-dark text-light text-center py-2">
                n-й караул :: {Date.now()}
            </header>
        )
    }
}

export default Header