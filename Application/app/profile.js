import React, { Component } from 'react'

import { Text,
        StyleSheet,
        View,
        TouchableOpacity,
        ScrollView,
        Image,
        Left,
        Right,
        Icon,
        AsyncStorage,
        Linking } from 'react-native'

import ImagePicker from 'react-native-image-picker';

const options={
title: 'Photo de profil',
takePhotoButtonTitle: 'Prendre une photo avec votre camera',
chooseFromLibraryButtonTitle: 'Choisir dans la librarie',
}


 class Profile extends Component {
   static navigationOptions = {
    drawerIcon:(
      <Image source={require('../image/male-profile-picture_icon-icons.com_68388.png')}
      style={{height:24,width:24}}/>
    )
  }
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
      <ScrollView>
        <View style={styles.containerTitre}>
		<TouchableOpacity
          onPress={() => this.props.navigation.navigate("Restes")}
          style={{flex: 1, alignItems: 'center', justifyContent: 'center'}}>
          <Image
            source={require('../image/icons8-gauche-50.png')}
            style={styles.icon}
            />
        </TouchableOpacity>
          <View style={{flex: 6, justifyContent: 'center'}}>
            <Text style={styles.titrePage}>Profil</Text>
          </View>
        </View>


        <View style={styles.header}></View>
         <Image source={this.state.avatarSource}  style={styles.avatar}/>
         <TouchableOpacity style={{margin:20,padding:20}}
             onPress={this.myfun}>
             <Text style={{color:'black', fontSize: 16, textAlign: 'center', fontWeight: 'bold', marginTop: 30}}>Edit</Text>
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

      </ScrollView>

    )
  }
}


const styles= StyleSheet.create({
  containerTitre: {
    backgroundColor:'#3A4750',
    flexDirection: 'row',
    height: 60
  },
  header:{
    backgroundColor: "#3A4750",
    height:100,
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
   fontSize:28,
   color: "black",
   fontWeight: "600",
   margin:-70
 },
  body:{
    marginTop:40,
  },

  bodyContent: {
    flex: 1,
    alignItems: 'center',
    padding:30,
  },
  titrePage: {
    color: '#FFFFFF',
    fontSize: 20,
    textAlign: 'center'
  },
  icon: {
    width: 35,
    height: 35,
    alignItems: 'center',
    justifyContent: 'center',
    alignSelf:'center',
  },
  txtIcon: {
   alignItems: 'center',
   justifyContent: 'center',
   textAlign:'center',
 }
})

export default Profile
