import React, { Component } from 'react'

import Header from './Header'
import Fields from './Fields'
import Schedule from './Schedule'

class App extends Component {
  render() {
    return (
      <div className="containers">
        <Header/>
        <div className="row">
            <Fields/>
            <Schedule/>
        </div>
      </div>
    )
  }
}

export default App
