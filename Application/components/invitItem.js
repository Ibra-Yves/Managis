import React from 'react'

import { StyleSheet, View, Text, Image, TouchableOpacity } from 'react-native'



class InvitItem extends React.Component {
  render() {
    const invit = this.props.invit


    return (
      <View style={styles.container}>
        <View style={styles.invit}>
          <View style={{flex: 1}}>
            <View style={styles.header}>
              <View style={{flex: 2}}>
                <Text style={styles.textTitle}>{invit.title}</Text>
              </View>
              <View style={{flex: 1}}>
                <Text style={styles.textDate}>{invit.date}</Text>
              </View>
            </View>
            <View style={styles.footer}>
              <Text style={styles.textPlace}>{invit.lieu}</Text>
              <TouchableOpacity
                onPress ={() => console.log("Accepter l'invitation")}
                style={styles.ok}>
                <Image
                  source={require('../image/icons8-ok-50.png')}
                  style={styles.icon}/>
              </TouchableOpacity>
              <TouchableOpacity
                onPress ={() => console.log("Refuser l'invitation")}
                style={styles.X}>
              <Image
                source={require('../image/icons8-fermer-la-fenêtre-50.png')}
                style={styles.icon}/>
              </TouchableOpacity>
            </View>
          </View>
        </View>
      </View>
    )
  }
}

const styles= StyleSheet.create({
  icon: {
    width: 30,
    height: 30,
  },
  ok: {
    flex: 1,
    alignItems: 'flex-end'
  },
  X: {
    flex: 1,
    alignItems: 'center'
  },
  container: {
    height: 100,
    padding: 12,
    paddingBottom: 3
  },
  invit: {
    flex: 1,
    backgroundColor: '#3A4750'
  },
  header: {
    flexDirection: 'row',
    flex: 1
  },
  footer: {
    flexDirection: 'row',
    flex: 1,
    justifyContent: 'center',
    marginLeft: 5
  },
  textTitle: {
    color: '#FFFFFF',
    fontSize: 22,
    margin: 5,
    marginTop: 2
  },
  textDate: {
    color: '#FFFFFF',
    fontSize: 12,
    margin: 5,
    marginTop: 10
  },
  textPlace: {
    justifyContent: 'center',
    color: '#FFFFFF',
    fontSize: 16,
    flex: 3
  }

})

export default InvitItem
