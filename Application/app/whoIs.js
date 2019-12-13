import React, { Component } from 'react';
import {
  StyleSheet,
  Text,
  Image,
  View,
  TouchableOpacity,
  ScrollView,
  Linking,
  SafeAreaView
} from 'react-native';



export default class WhoIs extends Component {
  render() {
    return (
      <SafeAreaView style={{ flex: 1 }}>
        <ScrollView contentContainerStyle={{ flexGrow: 1 }}>
          <View style={{ flex: 1, alignItems: 'center' }}>
            <View >
              <Text style={styles.titreBegin}>Notre commencement</Text>
              <Text style={styles.begin}>
                Nous sommes des étudiants en 3eme technologie de l'informatique à l'EPHEC de Louvain-La-Neuve.
                Dans le cadre de notre cours de projet d'intégration,
                nous avons comme tâche d'effectuer un projet qui nous serait utile dans la vie de tous les jours
              </Text>
            </View>
            <View style={{marginBottom: 10}}>
              <Text style={styles.titreBegin}>L'idée!</Text>
              <Text style={styles.begin}>
                Lors de notre voyage de fin d'étude nous sommes passé par l'étape d'organisation.
                C'est alors que nous nous sommes dit que nous allions créer une plateforme afin de faciliter cette tâche!
              </Text>
            </View>
            <View style={styles.imageContainer}>
              <Image
                source={require('../image/adri.jpg')}
                style={styles.image} />
            </View>
            <View>
              <Text style={styles.textImage}>Adrien Chellé</Text>
              <Text style={{ textAlign: 'center' }}>Product Owner/Application Mobile</Text>
            </View>
            <View style={{ flexDirection: 'row' }}>
              <TouchableOpacity
                onPress={() => Linking.openURL('https://www.facebook.com/adrien.chelle')}
                style={{ padding: 5 }}>
                <Image
                  source={require('../image/icons8-facebook-48.png')}
                  style={styles.icon} />
              </TouchableOpacity>
              <TouchableOpacity
                onPress={() => Linking.openURL('https://google.com')}
                style={{ padding: 5 }}>
                <Image
                  source={require('../image/icons8-linkedin-48.png')}
                  style={styles.icon} />
              </TouchableOpacity>
              <TouchableOpacity
                onPress={() => Linking.openURL('https://github.com/ATHOOS')}
                style={{ padding: 5 }}>
                <Image
                  source={require('../image/icons8-github-64.png')}
                  style={styles.icon} />
              </TouchableOpacity>
            </View>
            <View style={styles.imageContainer}>
              <Image
                source={require('../image/ambroise.jpg')}
                style={styles.image} />
            </View>
            <View>
              <Text style={styles.textImage}>Ambroise Mostin</Text>
              <Text style={{ textAlign: 'center' }}>Scrum Master/Application Mobile</Text>
            </View>
            <View style={{ flexDirection: 'row' }}>
              <TouchableOpacity
                onPress={() => Linking.openURL('https://www.facebook.com/ambroise.mostin')}
                style={{ padding: 5 }}>
                <Image
                  source={require('../image/icons8-facebook-48.png')}
                  style={styles.icon} />
              </TouchableOpacity>
              <TouchableOpacity
                onPress={() => Linking.openURL('https://google.com')}
                style={{ padding: 5 }}>
                <Image
                  source={require('../image/icons8-linkedin-48.png')}
                  style={styles.icon} />
              </TouchableOpacity>
              <TouchableOpacity
                onPress={() => Linking.openURL('https://github.com/amostin')}
                style={{ padding: 5 }}>
                <Image
                  source={require('../image/icons8-github-64.png')}
                  style={styles.icon} />
              </TouchableOpacity>
            </View>
            <View style={styles.imageContainer}>
              <Image
                source={require('../image/nico.png')}
                style={styles.image} />
            </View>
            <View>
              <Text style={styles.textImage}>Nicolas Viroux</Text>
              <Text style={{ textAlign: 'center' }}>Application Mobile et Réseau</Text>
            </View>
            <View style={{ flexDirection: 'row' }}>
              <TouchableOpacity
                onPress={() => Linking.openURL('https://www.facebook.com/nicolas.viroux.37')}
                style={{ padding: 5 }}>
                <Image
                  source={require('../image/icons8-facebook-48.png')}
                  style={styles.icon} />
              </TouchableOpacity>
              <TouchableOpacity
                onPress={() => Linking.openURL('https://google.com')}
                style={{ padding: 5 }}>
                <Image
                  source={require('../image/icons8-linkedin-48.png')}
                  style={styles.icon} />
              </TouchableOpacity>
              <TouchableOpacity
                onPress={() => Linking.openURL('https://github.com/VirouxNicolas')}
                style={{ padding: 5 }}>
                <Image
                  source={require('../image/icons8-github-64.png')}
                  style={styles.icon} />
              </TouchableOpacity>
            </View>
            <View style={styles.imageContainer}>
              <Image
                source={require('../image/ibra.png')}
                style={styles.image} />
            </View>
            <View>
              <Text style={styles.textImage}>Ibrahima Yves</Text>
              <Text style={{ textAlign: 'center' }}>Application Mobile et Réseau</Text>
            </View>
            <View style={{ flexDirection: 'row' }}>
              <TouchableOpacity
                onPress={() => Linking.openURL('https://www.facebook.com/ibrahima.yves')}
                style={{ padding: 5 }}>
                <Image
                  source={require('../image/icons8-facebook-48.png')}
                  style={styles.icon} />
              </TouchableOpacity>
              <TouchableOpacity
                onPress={() => Linking.openURL('https://google.com')}
                style={{ padding: 5 }}>
                <Image
                  source={require('../image/icons8-linkedin-48.png')}
                  style={styles.icon} />
              </TouchableOpacity>
              <TouchableOpacity
                onPress={() => Linking.openURL('https://github.com/Ibra-Yves')}
                style={{ padding: 5 }}>
                <Image
                  source={require('../image/icons8-github-64.png')}
                  style={styles.icon} />
              </TouchableOpacity>
            </View>
            <View style={styles.imageContainer}>
              <Image
                source={require('../image/dominik.jpg')}
                style={styles.image} />
            </View>
            <View>
              <Text style={styles.textImage}>Dominik Fiedorczuk</Text>
              <Text style={{ textAlign: 'center' }}>Développeur Web</Text>
            </View>
            <View style={{ flexDirection: 'row' }}>
              <TouchableOpacity
                onPress={() => Linking.openURL('https://www.facebook.com/dominik.fiedorczuk')}
                style={{ padding: 5 }}>
                <Image
                  source={require('../image/icons8-facebook-48.png')}
                  style={styles.icon} />
              </TouchableOpacity>
              <TouchableOpacity
                onPress={() => Linking.openURL('https://google.com')}
                style={{ padding: 5 }}>
                <Image
                  source={require('../image/icons8-linkedin-48.png')}
                  style={styles.icon} />
              </TouchableOpacity>
              <TouchableOpacity
                onPress={() => Linking.openURL('https://github.com/domad007')}
                style={{ padding: 5 }}>
                <Image
                  source={require('../image/icons8-github-64.png')}
                  style={styles.icon} />
              </TouchableOpacity>
            </View>
            <View style={styles.imageContainer}>
              <Image
                source={require('../image/Maxime.png')}
                style={styles.image} />
            </View>
            <View>
              <Text style={styles.textImage}>Maxime Liber</Text>
              <Text style={{ textAlign: 'center' }}>Développeur Web</Text>
            </View>
            <View style={{ flexDirection: 'row' }}>
              <TouchableOpacity
                onPress={() => Linking.openURL('https://www.facebook.com/maxime.liber')}
                style={{ padding: 5 }}>
                <Image
                  source={require('../image/icons8-facebook-48.png')}
                  style={styles.icon} />
              </TouchableOpacity>
              <TouchableOpacity
                onPress={() => Linking.openURL('https://google.com')}
                style={{ padding: 5 }}>
                <Image
                  source={require('../image/icons8-linkedin-48.png')}
                  style={styles.icon} />
              </TouchableOpacity>
              <TouchableOpacity
                onPress={() => Linking.openURL('https://github.com/LiberTMx')}
                style={{ padding: 5 }}>
                <Image
                  source={require('../image/icons8-github-64.png')}
                  style={styles.icon} />
              </TouchableOpacity>
            </View>
            <View style={styles.imageContainer}>
              <Image
                source={require('../image/remy.png')}
                style={styles.image} />
            </View>
            <View>
              <Text style={styles.textImage}>Rémy Vase</Text>
              <Text style={{ marginBottom: 5, textAlign: 'center' }}>Développeur Web</Text>
            </View>
            <View style={{ flexDirection: 'row' }}>
              <TouchableOpacity
                onPress={() => Linking.openURL('https://www.facebook.com/remy.vase')}
                style={{ padding: 5 }}>
                <Image
                  source={require('../image/icons8-facebook-48.png')}
                  style={styles.icon} />
              </TouchableOpacity>
              <TouchableOpacity
                onPress={() => Linking.openURL('https://google.com')}
                style={{ padding: 5 }}>
                <Image
                  source={require('../image/icons8-linkedin-48.png')}
                  style={styles.icon} />
              </TouchableOpacity>
              <TouchableOpacity
                onPress={() => Linking.openURL('https://github.com/RemyVase')}
                style={{ padding: 5 }}>
                <Image
                  source={require('../image/icons8-github-64.png')}
                  style={styles.icon} />
              </TouchableOpacity>
            </View>
          </View>
          <TouchableOpacity 
            onPress={() => this.props.navigation.goBack()}
            style={{flexDirection: 'row', alignSelf: 'center', alignItems: 'center', justifyContent: 'center', margin : 10}}>
            <Image  
              source={require('../image/icons8-gauche-50.png')}
              style={styles.icon} />
            <Text>Retour</Text>
          </TouchableOpacity>
        </ScrollView>
      </SafeAreaView>
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
    fontWeight: 'bold'
  },
  containerTitre: {
    backgroundColor: '#3A4750',
    width: 200,
    borderRadius: 25,
    marginVertical: 10,
    paddingVertical: 13,
    textAlign: 'center',
  },
  titreBegin: {
    textAlign: 'center',
    paddingVertical: 5,
    color: '#3A4750',
    fontWeight: 'bold',
    marginTop: 20,
    marginBottom: 5
  },
  begin: {
    minWidth: 200,
    maxWidth: 350,
    textAlign: 'justify'
  },
  icon: {
    width: 30,
    height: 30
  }
});
