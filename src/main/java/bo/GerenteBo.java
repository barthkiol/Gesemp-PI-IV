package bo;

import java.util.List;

import Classes.*;
import dao.*;

public class GerenteBo {

	
	public String salvar(Gerente gerente) throws Exception {
		validarDadosGrupo(gerente);

		// Chamar a DAo para inserir o gerente no BD
		GerenteDao dao = new GerenteDao();
		try {
			return dao.salvar(gerente);
		} catch (Exception e) {
			throw new Exception(e.getMessage());
		}
	}
	
	public String alterar(Gerente gerente) throws Exception {
		validarDadosGrupo(gerente);

		// Chamar a DAo para alterar o gerente no BD
		GerenteDao dao = new GerenteDao();
		try {
			return dao.alterar(gerente);
		} catch (Exception e) {
			throw new Exception(e.getMessage());
		}		
	}
	
	public String deletar(Gerente gerente) throws Exception {
		
		// Chamar a DAo para deletar o gerente no BD
		GerenteDao dao = new GerenteDao();
		try {
			return dao.deletar(gerente);
		} catch (Exception e) {
			throw new Exception(e.getMessage());
		}		
	}	
	
	public List<Gerente> consultar() throws Exception{	
		
		GerenteDao dao = new GerenteDao();
		try {
			return dao.consultar();
		} catch (Exception e) {
			throw new Exception(e.getMessage());
		}			
	}	

	private void validarDadosGrupo(Gerente gerente) throws Exception {
		// Valida��o da regra de neg�cio
		if (gerente.getNome().equals("")) {
			throw new Exception("Nome n�o pode ficar em branco!");
		}
		if (gerente.getEmail().equals("")) {
			throw new Exception("Email n�o pode ficar em branco!");
		}
		if (gerente.getSenha().equals("")) {
			throw new Exception("Senha n�o pode ficar em branco!");
		}
		
	}
}
