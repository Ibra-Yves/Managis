import React, { Component } from 'react'

import { Text, TextInput, TouchableOpacity, View, StyleSheet, AsyncStorage, Image, SafeAreaView } from 'react-native'

export default class ResteItemPerso extends Component {
    reste = this.props.navigation.state.params.reste


    constructor(props) {
        super(props)
        this.state = {
            UserId: [],
            userNomReste: this.reste.nomReste,
            userQuantiteReste: this.reste.quantiteReste,
            userDescriptionReste: this.reste.description,
            userAdresse: this.reste.adresse
        }
    }

    componentDidMount() {
        this._loadInitialState().done();
    }

    _loadInitialState = async () => {
        var value = await AsyncStorage.getItem('UserId');
        if (value !== null) {
            this.setState({ UserId: value });
        }
    }

    userModifAnnonce = () => {
        const { userNomReste } = this.state;
        const { userQuantiteReste } = this.state;
        const { userDescriptionReste } = this.state;
        const { userAdresse } = this.state;

        if (userNomReste == "") {

            this.setState({ userNomReste: 'Entrez le nom de votre reste ' })

        }
        else {

            fetch('http://localhost:8878/ManagisApp/ManagisApp/DBRestes/modifAnnonce.php', {
                method: 'POST',
                header: {
                    'Accept': 'application/json',
                    'Content-type': 'application/json'
                },
                body: JSON.stringify({
                    userId: this.state.UserId,
                    nomReste: userNomReste,
                    quantiteReste: userQuantiteReste,
                    descriptionReste: userDescriptionReste,
                    adresse: userAdresse,
                    idReste: this.reste.idReste
                })

            })
                .then((response) => response.json())
                .then((responseJson) => {
                    alert(responseJson);
                })
                .catch((error) => {
                    console.error(error);
                });
        }
    }

    userDeleteAnnonce = () => {
        const { userNomReste } = this.state;
        const { userQuantiteReste } = this.state;
        const { userDescriptionReste } = this.state;
        const { userAdresse } = this.state;

        if (userNomReste == "") {

            this.setState({ userNomReste: 'Entrez le nom de votre reste ' })

        }
        else {

            fetch('http://localhost:8878/ManagisApp/ManagisApp/DBRestes/deleteAnnonce.php', {
                method: 'POST',
                header: {
                    'Accept': 'application/json',
                    'Content-type': 'application/json'
                },
                body: JSON.stringify({
                    idReste: this.reste.idReste
                })

            })
                .then((response) => response.json())
                .then((responseJson) => {
                    alert(responseJson);
                })
                .catch((error) => {
                    console.error(error);
                });
        }
    }

    render() {
        return (
            <SafeAreaView style={{ flex: 1 }}>
                <View>
                    <View style={styles.containerTitre}>
                        <View style={{ flex: 1, alignItems: 'center', justifyContent: 'center' }}>
                            <TouchableOpacity
                                onPress={() => this.props.navigation.goBack()}>
                                <Image
                                    style={styles.icon}
                                    source={require('../image/icons8-gauche-50.png')}
                                />
                            </TouchableOpacity>

                        </View>
                        <View style={{ flex: 6, justifyContent: 'center' }}>
                            <Text style={styles.titrePage}>Détails de votre annonce</Text>
                        </View>
                        <View style={{ flex: 1 }}>

                        </View>
                    </View>
                    <View style={{ alignItems: 'center', justifyContent: 'center' }}>
                        <Text style={{ color: '#3A4750', marginTop: 10 }}>Nom de votre annonce</Text>
                    </View>
                    <View style={styles.inputContainer}>
                        <TextInput
                            style={styles.inputBox}
                            placeholder={this.reste.nomReste}
                            placeholderTextColor='#FFFFFF'
                            onChangeText={userNomReste => this.setState({ userNomReste })}
                        />
                    </View>
                    <View style={{ alignItems: 'center', justifyContent: 'center' }}>
                        <Text style={{ color: '#3A4750', marginTop: 10, marginBottom: 8 }}>Quantité</Text>
                    </View>
                    <View style={styles.inputContainer}>
                        <TextInput
                            style={styles.inputBox}
                            placeholder={this.reste.quantiteReste}
                            placeholderTextColor='#FFFFFF'
                            onChangeText={userQuantiteReste => this.setState({ userQuantiteReste })}
                        />
                    </View>
                    <View style={{ alignItems: 'center', justifyContent: 'center' }}>
                        <Text style={{ color: '#3A4750', marginTop: 10, marginBottom: 8 }}>Description</Text>
                    </View>
                    <View style={styles.inputContainer}>
                        <TextInput
                            style={styles.inputBox}
                            placeholder={this.reste.description}
                            placeholderTextColor='#FFFFFF'
                            onChangeText={userDescriptionReste => this.setState({ userDescriptionReste })}
                        />
                    </View>
                    <View style={{ alignItems: 'center', justifyContent: 'center' }}>
                        <Text style={{ color: '#3A4750', marginTop: 10, marginBottom: 8 }}>Adresse</Text>
                    </View>
                    <View style={styles.inputContainer}>
                        <TextInput
                            style={styles.inputBox}
                            placeholder={this.reste.adresse}
                            placeholderTextColor='#FFFFFF'
                            onChangeText={userAdresse => this.setState({ userAdresse })}
                        />
                    </View>
                    <View style={styles.submitContainer}>
                        <TouchableOpacity
                            onPress={this.userModifAnnonce}
                            style={styles.submitButton}>
                            <Text style={{ color: 'white', textAlign: 'center' }}>Modifier</Text>
                        </TouchableOpacity>
                    </View>
                    <View style={styles.submitContainer}>
                        <TouchableOpacity
                            onPress={this.userDeleteAnnonce}
                            style={styles.submitButton}>
                            <Text style={{ color: 'white', textAlign: 'center' }}>Supprimer</Text>
                        </TouchableOpacity>
                    </View>
                </View>
            </SafeAreaView>

        )
    }
}

const styles = StyleSheet.create({
    inputBox: {
        width: 300,
        backgroundColor: '#3A4750',
        borderRadius: 25,
        paddingVertical: 12,
        fontSize: 16,
        color: '#FFFFFF',
        textAlign: 'center',
        marginVertical: 10
    },
    submitButton: {
        backgroundColor: '#3A4750',
        width: 100,
        borderRadius: 25,
        marginVertical: 10,
        paddingVertical: 13,
        textAlign: 'center',
        color: '#FFFFFF'
    },
    submitContainer: {
        alignItems: 'center',
        justifyContent: 'flex-end'
    },
    inputContainer: {
        alignItems: 'center',
        justifyContent: 'flex-end'
    },
    titrePage: {
        color: '#FFFFFF',
        fontSize: 18,
        textAlign: 'center'
    },
    containerTitre: {
        backgroundColor: '#3A4750',
        flexDirection: 'row',
        height: 60
    },
    icon: {
        height: 30,
        width: 30
    },

})
