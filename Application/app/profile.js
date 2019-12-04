import React, { Component } from 'react';
import {
  StyleSheet,
  Text,
  View,
  Image,
  TouchableOpacity,
  AppRegistry,
  AsyncStorage,
  Linking
} from 'react-native';

import Login from './login.js';

import ImagePicker from 'react-native-image-picker';

const options={
title: 'Photo de profil',
takePhotoButtonTitle: 'Prendre une photo avec votre camera',
chooseFromLibraryButtonTitle: 'Choisir dans la librarie',
}

export default class Profile extends Component {
  constructor(props){
    super(props);
    this.state={
      avatarSource: null,
      pic:null,
      UserEmail: [],
    }
  }

  myfun=()=>{

  ImagePicker.showImagePicker(options, (response) => {
    console.log('Response = ', response);

    if (response.didCancel) {
      console.log('User cancelled image picker');
    }
    else if (response.error) {
      console.log('Image Picker Error: ', response.error);
    }

    else {
      let source = { uri: response.uri };



      this.setState({
        avatarSource: source,
        pic:response.data
      });
    }
  });
}

  componentDidMount(){
    this._loadInitialState().done();
  }
  _loadInitialState = async () => {
    var value = await AsyncStorage.getItem('UserEmail');
    if (value !==null) {
      this.setState({UserEmail: value});
    }

  }
  render() {
    return (
      <View style={styles.container}>
          <View style={styles.header}></View>
          <Image source={this.state.avatarSource}  style={styles.avatar}/>
          <TouchableOpacity style={{margin:20,padding:20}}
              onPress={this.myfun}>
              <Text style={{color:'black', fontSize: 16, textAlign: 'center', fontWeight: 'bold', marginTop: 20}}>Edit</Text>
              </TouchableOpacity>
          <View style={styles.body}>
            <View style={styles.bodyContent}>
              <Text style={styles.name}> {this.state.UserEmail}</Text>
            </View>
            <View>
            <TouchableOpacity
              onPress={() => Linking.openURL('https://www.facebook.com/')}
              style={{padding: 5}}>
              <Image
                source={require('../image/icons8-facebook-48.png')}
                style={styles.icon}/>
                <Text style={styles.txtIcon}> Facebook</Text>
            </TouchableOpacity>
            <TouchableOpacity
              onPress={() => Linking.openURL('https://twitter.com/')}
              style={{padding: 5}}>
              <Image
                source={require('../image/icons8-twitter-32.png')}
                style={styles.icon}/>
                <Text style={styles.txtIcon}> Twitter</Text>
            </TouchableOpacity>
            </View>
        </View>
      </View>
    );
  }
}

const styles = StyleSheet.create({
  header:{
    backgroundColor: "#3A4750",
    height:200,
  },
  avatar: {
    width: 130,
    height: 130,
    borderRadius: 63,
    borderWidth: 4,
    borderColor: 'white',
    marginBottom:10,
    alignSelf:'center',
    position: 'absolute',
    marginTop:130,
    backgroundColor: '#D3D3D3'
  },
  name:{
    fontSize:22,
    color:"white",
    fontWeight:'600',
    marginTop:-40
  },
  body:{
    marginTop:40,
  },
  bodyContent: {
    flex: 1,
    alignItems: 'center',
    padding:30,
  },
  name:{
    fontSize:28,
    color: "black",
    fontWeight: "600",
    margin:-70
  },
  info:{
    fontSize:16,
    color: "#3A4750",
    marginTop:10
  },
  description:{
    fontSize:16,
    color: "#696969",
    marginTop:10,
    textAlign: 'center'
  },
  icon: {
    width: 40,
    height: 40,
    alignItems: 'center',
    justifyContent: 'center',
    alignSelf:'center',
  },
  txtIcon: {
    alignItems: 'center',
    justifyContent: 'center',
    textAlign:'center',
  },
  buttonContainer: {
    marginTop:50,
    height:45,
    flexDirection: 'row',
    justifyContent: 'center',
    alignItems: 'center',
    marginBottom:20,
    width:250,
    borderRadius:30,
    backgroundColor: "#3A4750"
  },
  phrase: {
    color: 'white',
  }
});
