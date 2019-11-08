import React from 'react'
import { StyleSheet, Image } from 'react-native'
import { createStackNavigator } from 'react-navigation-stack'
import { createAppContainer } from 'react-navigation'
import { createBottomTabNavigator } from 'react-navigation-tabs'
import ConnexionInscription from '../Components/ConnexionInscription'
import Quid from '../Components/Quid'


const ConnexionInscriptionStackNavigator = createStackNavigator({
  ConnexionInscription: {
    screen: ConnexionInscription,
    navigationOptions: {
      title: 'Connexion/Inscription',
      headerShown: false
    }
  }
})


const QuidStackNavigator = createStackNavigator({
  Quid: {
    screen: Quid,
    navigationOptions: {
      title: "Qui sommes nous ?",
      headerShown: false
    }
  }
})


const ManagisTabNavigator = createBottomTabNavigator({
  ConnexionInscription: {
    screen: ConnexionInscriptionStackNavigator,
    navigationOptions: {
      tabBarIcon: () => {
        return <Image
          source={require('../Images/icons8-connexion-50.png')}
          style={styles.icon}/>
      }
    }
  },
  Quid: {
    screen: QuidStackNavigator,
    navigationOptions: {
      tabBarIcon: () => {
        return <Image
          source={require('../Images/icons8-question-50.png')}
          style={styles.icon}/>
      }
    }
  }
}, {
  tabBarOptions: {
    showLabel: false,
    showIcon: true,
    activeBackgroundColor: '#DDDDDD',
    inactiveBackgroundColor: '#FFFFFF'
  }
})

const styles= StyleSheet.create({
  icon: {
    width: 30,
    height: 30
  }
})

export default createAppContainer(ManagisTabNavigator)
