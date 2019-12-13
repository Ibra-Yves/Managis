import React, { Component } from 'react'

import { View, ImageBackground, Text, TouchableOpacity, Image, StyleSheet, ScrollView, SafeAreaView } from 'react-native'

class Evenement extends Component {
  render() {
    return (
      <SafeAreaView style={{ flex: 1 }}>
        <ScrollView>
          <View style={{ flexDirection: 'row', backgroundColor: '#3A4750', height: 60 }}>
            <View style={{ alignItems: 'center', justifyContent: 'center', flex: 1 }}>
            </View>
            <View style={{ flex: 6, justifyContent: 'center' }}>
              <Text style={styles.titrePage}>Evénements et Invitations</Text>
            </View>
            <View style={{ flex: 1, justifyContent: 'center', alignItems: 'center' }}>
              <TouchableOpacity
                onPress={() => this.props.navigation.openDrawer('myNav')}
              >
                <Image
                  source={require('../image/icons8-menu-arrondi-50.png')}
                  style={styles.icon}
                />
              </TouchableOpacity>
            </View>
          </View>
          <View style={styles.container}>
            <Image
              source={require('../image/logo_transparent.png')}
              style={styles.logo} />
            <TouchableOpacity
              onPress={() => this.props.navigation.navigate('EventFutur')}
              style={styles.btn2}>
              <Text style={styles.btnText}>Vos événements</Text>
            </TouchableOpacity>
            <TouchableOpacity
              onPress={() => this.props.navigation.navigate('Invitation')}
              style={styles.btn2}>
              <Text style={styles.btnText}>Voir vos invitations</Text>
            </TouchableOpacity>
          </View>
        </ScrollView>
      </SafeAreaView>
    )
  }
}

const styles = StyleSheet.create({
  container: {
    display: 'flex',
    alignItems: 'center',
    justifyContent: 'center'
  },
  logo: {
    width: 400,
    height: 350
  },
  btn2: {
    backgroundColor: '#3A4750',
    padding: 10,
    margin: 15,
    width: '80%',
    alignItems: 'center',
    justifyContent: 'center',
    borderRadius: 50
  },
  btnText: {
    color: 'white',
    fontSize: 20,
    alignItems: 'center',
    justifyContent: 'center'
  },
  containerTitre: {
    backgroundColor: '#3A4750',
    flexDirection: 'row',
    height: 60
  },
  icon: {
    width: 30,
    height: 30
  },
  titrePage: {
    color: '#FFFFFF',
    fontSize: 18,
    textAlign: 'center'
  },

})

export default Evenement