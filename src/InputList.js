import React, {Component} from 'react'
import ActionButtons from './ActionButtons'

class InputList extends Component {
    list = () => {
        if (this.props.type === 'special') {
            return (
                <div className="special">
                    <input type="text"/>
                </div>
            )
        } else {
            return (
                <div className="card col-6">
                    <h3>Subtitle</h3>
                    <form className={this.props.type}>
                        <input type="text" placeholder="Type name"/>
                    </form>
                    <ActionButtons />
                </div>
            )
        }
    }

    render() {
        console.log(this.list())
        return this.list()
    }
}

export default InputList