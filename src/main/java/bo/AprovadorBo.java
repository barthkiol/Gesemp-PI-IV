package bo;

import java.util.List;

import Classes.*;
import dao.*;

public class AprovadorBo {

	
	public String salvar(Aprovador aprovador) throws Exception {
		validarDadosGrupo(aprovador);

		// Chamar a DAo para inserir o aprovador no BD
		AprovadorDao dao = new AprovadorDao();
		try {
			return dao.salvar(aprovador);
		} catch (Exception e) {
			throw new Exception(e.getMessage());
		}
	}
	
	public String alterar(Aprovador aprovador) throws Exception {
		validarDadosGrupo(aprovador);

		// Chamar a DAo para alterar o aprovador no BD
		AprovadorDao dao = new AprovadorDao();
		try {
			return dao.alterar(aprovador);
		} catch (Exception e) {
			throw new Exception(e.getMessage());
		}		
	}
	
	public String deletar(Aprovador aprovador) throws Exception {
		
		// Chamar a DAo para deletar o aprovador no BD
		AprovadorDao dao = new AprovadorDao();
		try {
			return dao.deletar(aprovador);
		} catch (Exception e) {
			throw new Exception(e.getMessage());
		}		
	}	
	
	public List<Aprovador> consultar() throws Exception{	
		
		AprovadorDao dao = new AprovadorDao();
		try {
			return dao.consultar();
		} catch (Exception e) {
			throw new Exception(e.getMessage());
		}			
	}	

	private void validarDadosGrupo(Aprovador aprovador) throws Exception {
		// Valida��o da regra de neg�cio
		if (aprovador.getNome().equals("")) {
			throw new Exception("Nome n�o pode ficar em branco!");
		}
		if (aprovador.getEmail().equals("")) {
			throw new Exception("Email n�o pode ficar em branco!");
		}
		if (aprovador.getSenha().equals("")) {
			throw new Exception("Senha não pode ficar em branco");
		}
		
	}
}
