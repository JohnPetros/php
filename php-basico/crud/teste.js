

import React, {Component, useState, useEffect} from 'react';
import {
	View,
	Text,
	Image,
	FlatList,
	StyleSheet,
	SafeAreaView,
	TouchableOpacity,
	ActivityIndicator,
} from 'react-native';

// https://br.000webhost.com/login-cpanel?from=panel
// https://seer.uniacademia.edu.br/index.php/ANL/article/viewFile/3090/2093

const listaEscola = ({route, navigation}) => {
	// Criando state para armazenar a lista de produtos.
	const [listaInfo, setListaInfo] = useState([]);
	
	// Criando variável para a indicação de busca.
	const [loading, setLoading] = useState(false);
	
	// Criando variável de duração de tempo esgotado.
	const [timeOut, setTimeOut] = useState(10000);
	const [viewLista, setViewLista] = useState(true);
	const [viewImage, setViewImage] = useState(true);
	const [selecionado, setSelecionado] = useState('');
	const [imagem_selecionada, setImagemSelecionada] = useState('');
	
	const clickItemFlatList = (item) => {
		global.idEscola=item.idEscola
		alert(item.idEscola)
	};
	
	// Executando construtor.
	useEffect(() => getInformacoesBD(), []);
	
	async function getInformacoesBD() {
		setLoading(true);
		
		// Endereço remoto do localhost (via ngrok).
		var url = 'http://bluecaremobile.000webhostapp.com/listaEscola.php';
		// url = 'https://demo0748619.mockable.io/teste'
		
		// Fazendo uma requisição (http ao script que está encarregado de realizar a consulta de informações no banco de dados).
		// ... Criando objeto de configuração aqui (não relevante).
		var wasServerTimeout = false;
		var timeout = setTimeout(() => {
			wasServerTimeout = true;
			setLoading(false);
			alert('Tempo de espera para busca de informações excedido.');
		}, timeOut);
		
		const resposta = await fetch(url, {
			// Tipo de requisição.
			method: 'GET',
		})
		
		// Quando o script php terminar de executar vai executar a próxima linha.
		.then((response) => {
			timeout && clearTimeout(timeout); // Verificando se tudo está certo.
			
			// Retorna o JSON.
			if (!wasServerTimeout) return response.json();
		})
		
		.then((responseJson) => {
			// Verificando se os dados já foram convertido.
			// Exibindo os dados obtidos do banco de dados.
			// alert(JSON.stringify(responseJson))
			setListaInfo([]);
        
			for (var i = 0; i < responseJson.escola.length; i++) {
				setListaInfo((listaInfo) => {
					const list = [
						...listaInfo,
						{
							idEscola: responseJson.escola[i].idEscola,
							nome: responseJson.escola[i].nome,
							diretora: responseJson.escola[i].diretora,
						},
					];
					return list;
				});
			}
		})
		
		// Verificando se houve erros.
		.catch((error) => {
			timeout && clearTimeout(timeout);
			if (!wasServerTimeout) {
				// Erro de lógica.
			}
			
			// alert('ERRO: ' + error)
		});
		
		setLoading(false);
	}
	
	return (
		<SafeAreaView style={{flex: 1}}>
			{viewLista ? (
				<View style={{flex: 1, padding: 16}}>
					{loading ? (
						<View style={{flex: 1}}>
							<Text
								style={{
									fontSize: 25,
									textAlign: 'center',
									marginBottom: 16,
									fontFamily: 'century gothic',
								}}>
								Aguarde obtendo informações
							</Text>
							<ActivityIndicator size="small" color="#0000ff" />
						</View>
					) : (
						<View>
							<Text
								style={[{
									fontSize: 25,
									textAlign: 'center',
									fontFamily: 'century gothic',
								}]}>
								Lista de escolas
							</Text>
							<Text
								style={[{
									fontSize: 15,
									textAlign: 'center',
									marginBottom: 10,
									fontFamily: 'century gothic',
									color: 'gray'
								}]}>
								Nome e diretor(a) das escolas
							</Text>
						</View>
					)}
					<FlatList
						data={listaInfo}
						style={{alignSelf: 'center'}}
						renderItem={({item}) => (
							<TouchableOpacity onPress={() => clickItemFlatList(item)}>
								<View
									style={{
										borderBottomWidth: 1,
										borderTopWidth: 1,
										borderLeftWidth: 1,
										borderRightWidth: 1,
										borderRadius: 5,
										borderColor: '#304875',
										backgroundColor: item.idEscola % 2 == 0 ? '#546cac' : '#84a4dc',
										width: 270,
										marginTop: 5,
									}}>
									<View style={[{flexDirection: 'row', alignContent: 'center'}]}>
										<View style={{padingLeft: 16}}>
											<View style={[{flexDirection: 'row'}]}>
												<View style={[{borderColor: '#304875', borderRightWidth: 1, borderRadius: 6}]}>
													<Image
														style={[{width: 70, height: 70, marginLeft: 10, marginRight: 10}]}
														source={require('../assets/Escola.png')}
													/>
												</View>
												<View>
													<Text style={[styles.fontTexto, {color: 'white'}]}> ID: {item.idEscola} </Text>
													<Text style={[styles.fontTexto, {color: 'white'}]}> Nome: {item.nome} </Text>
													<Text style={[styles.fontTexto, {color: 'white'}]}> Diretor(a): {item.diretora} </Text>
												</View>
											</View>
										</View>
									</View>
								</View>
							</TouchableOpacity>
						)}
					/>
				</View>
			) : (
				<View alignItems="center">
					<Text> Hino </Text>
					<View style={{ padingLeft: 20, paddingRight: 20 }}>
						<Image
							style={styles.logotipo}
							source={{uri: imagem_selecionada}}
						/>
					</View>
					<Text> {selecionado} </Text>
					<TouchableOpacity
						style={{
							alignItems: 'center',
							paddingRight: 5,
							width: 100,
							height: 20,
							borderRadius: 5,
							borderWidth: 1,
						}}
						onPress={() => setViewLista(true)}>
						<Text style={{textAlign: 'center'}}> Voltar </Text>
					</TouchableOpacity>
				</View>
			)}
		</SafeAreaView>
	);
};

export default listaEscola;
const styles = StyleSheet.create({
	fontTexto: {
		margin: 4,
		fontWeight: 'italic',
		fontSize: 10,
		fontFamily: 'century gothic',
		color: 'black',
	},
	logotipo: {
		alignItems: 'center',
		height: 192,
		width: 160,
		marginTop: 10,
		marginLeft: 10,
	},
})