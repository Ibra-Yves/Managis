import React, { Component } from 'react';
import { Text, View, StyleSheet, Image, ScrollView } from 'react-native';

export default class Quid extends Component {
  render() {
    return (
      <ScrollView contentContainerStyle={{ flexGrow: 1}}>
        <View style={{flex: 1}}>
          <View style={styles.titrePage}>
            <Text>Qui sommes nous ?</Text>
          </View>
          <View style={styles.imageContainer}>
            <Image
              source={require('../Images/adri.jpg')}
              style={styles.image}/>
          </View>
          <View>
            <Text style={styles.textImage}>Adrien Chellé{"\n"}Product Owner/Application Mobile</Text>
          </View>
          <View style={styles.imageContainer}>
            <Image
              source={require('../Images/ambroise.jpg')}
              style={styles.image}/>
          </View>
          <View>
            <Text style={styles.textImage}>Ambroise Mostin{"\n"}Scrum Master/Application Mobile</Text>
          </View>
          <View style={styles.imageContainer}>
            <Image
              source={require('../Images/nico.png')}
              style={styles.image}/>
          </View>
          <View>
            <Text style={styles.textImage}>Nicolas Viroux{"\n"}Application Mobile et Réseau</Text>
          </View>
          <View style={styles.imageContainer}>
            <Image
              source={require('../Images/ibra.png')}
              style={styles.image}/>
          </View>
          <View>
            <Text style={styles.textImage}>Ibrahima Yves{"\n"}Application Mobile et Réseau</Text>
          </View>
          <View style={styles.imageContainer}>
            <Image
              source={require('../Images/dominik.jpg')}
              style={styles.image}/>
          </View>
          <View>
            <Text style={styles.textImage}>Dominik Fiedorczuk{"\n"}Développeur Web</Text>
          </View>
          <View style={styles.imageContainer}>
            <Image
              source={require('../Images/Maxime.png')}
              style={styles.image}/>
          </View>
          <View>
            <Text style={styles.textImage}>Maxime Liber{"\n"}Développeur Web</Text>
          </View>
          <View style={styles.imageContainer}>
            <Image
              source={require('../Images/remy.png')}
              style={styles.image}/>
          </View>
          <View>
            <Text style={styles.textImage}>Rémy Vase{"\n"}Développeur Web/Application Mobile</Text>
          </View>
        </View>
      </ScrollView>
    );
  }
}

const styles = StyleSheet.create({
  imageContainer: {
    alignItems: 'center',
    justifyContent: 'flex-end',
    paddingVertical: 5
  },
  image: {
    width: 100,
    height: 100,
    borderRadius: 50,
    borderWidth: 1,
    borderColor: '#3A4750'
  },
  textImage: {
    textAlign: 'center',
    marginVertical: 10,
		paddingVertical: 10
  }
});
