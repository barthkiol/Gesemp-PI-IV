package bo;

import java.util.List;

import Classes.*;
import dao.*;

public class CompradorBo {

	
	public String salvar(Comprador comprador) throws Exception {
		validarDadosGrupo(comprador);

		// Chamar a DAo para inserir o comprador no BD
		CompradorDao dao = new CompradorDao();
		try {
			return dao.salvar(comprador);
		} catch (Exception e) {
			throw new Exception(e.getMessage());
		}
	}
	
	public String alterar(Comprador comprador) throws Exception {
		validarDadosGrupo(comprador);

		// Chamar a DAo para alterar o comprador no BD
		CompradorDao dao = new CompradorDao();
		try {
			return dao.alterar(comprador);
		} catch (Exception e) {
			throw new Exception(e.getMessage());
		}		
	}
	
	public String deletar(Comprador comprador) throws Exception {
		
		// Chamar a DAo para deletar o comprador no BD
		CompradorDao dao = new CompradorDao();
		try {
			return dao.deletar(comprador);
		} catch (Exception e) {
			throw new Exception(e.getMessage());
		}		
	}	
	
	public List<Comprador> consultar() throws Exception{	
		
		CompradorDao dao = new CompradorDao();
		try {
			return dao.consultar();
		} catch (Exception e) {
			throw new Exception(e.getMessage());
		}			
	}	

	private void validarDadosGrupo(Comprador comprador) throws Exception {
		// Valida��o da regra de neg�cio
		if (comprador.getNome().equals("")) {
			throw new Exception("Nome n�o pode ficar em branco!");
		}
		if (comprador.getEmail().equals("")) {
			throw new Exception("Email n�o pode ficar em branco!");
		}
		if (comprador.getSenha().equals("")) {
			throw new Exception("Senha n�o pode ficar em branco!");
		}
		
	}
}
