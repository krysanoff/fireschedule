import React, {Component} from 'react'

class ActionButtons extends Component {
    clickHandler = () => {
        console.log('click')
    }

    render() {
        return (
            <div className="row">
                <div className="col-2">
                    <a onClick={this.clickHandler}>+</a>
                </div>

                <div className="col-2">
                    <a onClick={this.clickHandler}>down</a>
                </div>

                <div className="col-2">
                    <a onClick={this.clickHandler}>up</a>
                </div>
            </div>
        )
    }
}

export default ActionButtons