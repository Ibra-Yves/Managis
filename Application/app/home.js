import React, { Component } from 'react';
import {
	AppRegistry,
	View,
	Text,
	StyleSheet,
	TouchableOpacity,
	Image,
	SafeAreaView
} from 'react-native';

export default class home extends Component {

	render() {
		const { navigate } = this.props.navigation;
		return (
			<SafeAreaView style={{ flex: 1 }}>
				<View style={styles.container}>
					<Image
						source={require('../image/logo_transparent.png')}
						style={styles.logo} />
					<TouchableOpacity
						onPress={() => navigate('Login')}
						style={styles.btn1}>
						<Text style={styles.btnText}>Se connecter</Text>
					</TouchableOpacity>
					<TouchableOpacity
						onPress={() => navigate('Register')}
						style={styles.btn2}>
						<Text style={styles.btnText}>S'enregistrer</Text>
					</TouchableOpacity>

					<TouchableOpacity
						onPress={() => navigate('WhoIs')}
						style={styles.btn2}>
						<Text style={styles.btnText}>Qui sommes-nous ?</Text>
					</TouchableOpacity>


				</View>
			</SafeAreaView>
		);
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
		height: 350,
		marginTop: 20
	},
	btn1: {
		backgroundColor: '#3A4750',
		padding: 10, margin: 10, width: '85%',
		alignItems: 'center',
		justifyContent: 'center',
		borderRadius: 25
	},
	btn2: {
		backgroundColor: '#3A4750',
		padding: 10, margin: 10, width: '85%',
		alignItems: 'center',
		justifyContent: 'center',
		borderRadius: 25
	},
	btnText: {
		color: '#FFFFFF',
		alignItems: 'center',
		justifyContent: 'center',
		fontSize: 16
	},

});


AppRegistry.registerComponent('home', () => home);
