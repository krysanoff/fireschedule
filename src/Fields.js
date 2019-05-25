import React, {Component} from 'react'
import InputList from './InputList'

class Fields extends Component {
    render() {
        return (
            <section className="col-6">
                <div className="row">
                    <InputList type="driver" />
                    <InputList type="firefighter" />
                </div>

                <InputList type="special" />
            </section>
        )
    }
}

export default Fields