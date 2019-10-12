import React, { Component} from 'react'

import { Router, Stack, Scene } from 'react-native-router-flux';

import Login from '../Components/Login.js';
import Signup from '../Components/Signup.js';

//import { createAppContainer } from '@react-navigation/native';
//import { createStackNavigator} from 'react-navigation-stack';

//const AppContainer = createAppContainer(AppNavigator);


export default class Routes extends Component {
    render(){
        return(
            <Router>
                <Stack key="root" hideNavBar={true}>
                    <Scene key="login" component={Login} title="Login" initial={true}/>
                    <Scene key="Signup" component={Signup} title="Register"/>
                </Stack>
            </Router>
        )
    }
}
