import React, {Component} from 'react'

import {Text, TouchableOpacity, } from 'react-native'

export default class ResteItem extends Component {
    reste = this.props.navigation.state.params.reste
    render(){
        return(
            <Text>details de l'annonce {this.reste.idReste}</Text>
        )
    }
}
