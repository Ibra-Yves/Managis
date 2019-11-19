import React, { Component } from 'react';
import {
  AppRegistry,
  StyleSheet,
  Text,
  Image,
  View,
  TouchableOpacity,
  TextInput,
  Button,
  Keyboard,
  ScrollView,
  Liking
} from 'react-native';
import { StackNavigator } from 'react-navigation';


export default class WhoIs extends Component {
	static navigationOptions= ({navigation}) =>({
		  title: 'WhoIs',
		  headerRight:
		  <TouchableOpacity
			onPress={() => navigation.navigate('Home')}
			style={{margin:10,backgroundColor:'#3A4750',padding:10}}>
			<Text style={{color:'#ffffff'}}>Home</Text>
		  </TouchableOpacity>

	});

  render() {
    return (
      <ScrollView contentContainerStyle={{ flexGrow: 1}}>
        <View style={{flex: 1, alignItems: 'center'}}>
          <View style={styles.imageContainer}>
            <Image
              source={require('../image/adri.jpg')}
              style={styles.image}/>
          </View>
          <View>
            <Text style={styles.textImage}>Adrien Chellé</Text>
            <Text style={{textAlign: 'center'}}>Product Owner/Application Mobile</Text>
          </View>
          <View style={styles.imageContainer}>
            <Image
              source={require('../image/ambroise.jpg')}
              style={styles.image}/>
          </View>
          <View>
            <Text style={styles.textImage}>Ambroise Mostin</Text>
            <Text style={{textAlign: 'center'}}>Scrum Master/Application Mobile</Text>
          </View>
          <View style={styles.imageContainer}>
            <Image
              source={require('../image/nico.png')}
              style={styles.image}/>
          </View>
          <View>
            <Text style={styles.textImage}>Nicolas Viroux</Text>
            <Text style={{textAlign: 'center'}}>Application Mobile et Réseau</Text>
          </View>
          <View style={styles.imageContainer}>
            <Image
              source={require('../image/ibra.png')}
              style={styles.image}/>
          </View>
          <View>
            <Text style={styles.textImage}>Ibrahima Yves</Text>
            <Text style={{textAlign: 'center'}}>Application Mobile et Réseau</Text>
          </View>
          <View style={styles.imageContainer}>
            <Image
              source={require('../image/dominik.jpg')}
              style={styles.image}/>
          </View>
          <View>
            <Text style={styles.textImage}>Dominik Fiedorczuk</Text>
            <Text style={{textAlign: 'center'}}>Développeur Web</Text>
          </View>
          <View style={styles.imageContainer}>
            <Image
              source={require('../image/Maxime.png')}
              style={styles.image}/>
          </View>
          <View>
            <Text style={styles.textImage}>Maxime Liber</Text>
            <Text style={{textAlign: 'center'}}>Développeur Web</Text>
          </View>
          <View style={styles.imageContainer}>
            <Image
              source={require('../image/remy.png')}
              style={styles.image}/>
          </View>
          <View>
            <Text style={styles.textImage}>Rémy Vase</Text>
            <Text style={{marginBottom: 5, textAlign: 'center'}}>Développeur Web</Text>
          </View>
          <View >
            <Text>Notre commencement</Text>
            <Text>
              Nous sommes des étudiants en 3eme technologie de l'informatique à l'EPHEC de Louvain-La-Neuve.
              Dans le cadre de notre cours de projet d'intégration,
              nous avons comme tâche d'effectuer un projet qui nous serait utile dans la vie de tous les jours
            </Text>
          </View>
          <View>
            <Text>L'idée!</Text>
            <Text>
              Lors de notre voyage de fin d'étude nous sommes passé par l'étape d'organisation.
              C'est alors que nous nous sommes dit que nous allions créer une plateforme afin de faciliter cette tâche!
            </Text>
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
		paddingVertical: 5,
    color: '#3A4750',
    fontWeight: 'bold',
  },
  containerTitre: {
    backgroundColor:'#3A4750',
		width:200,
		borderRadius: 25,
		marginVertical: 10,
		paddingVertical: 13,
    textAlign: 'center',
  }
});
