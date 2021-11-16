package teste;

import Classes.Comprador;
import Classes.Fornecedor;
import Classes.Gerente;
import bo.CompradorBo;
import bo.FornecedorBo;
import bo.GerenteBo;


public class TesteBanco {

	public static void main(String[] args) {
		// TODO Auto-generated method stub
		
		
		// INSERT DE CATEOGORIA
//		Categoria categoria = new Categoria();
//		categoria.setNome("sapato");
//		Categoria categoriaPai = new Categoria();
//		categoriaPai.setId(2);
//		categoria.setCategoria(categoriaPai);
//		CategoriaDao dao = new CategoriaDao();
//		try {
//			dao.salvar(categoria);
//		} catch (Exception e) {
//			System.out.println(e);
//		}
		
	
		// INSERT DE ATRIBUTO
//		Atributo atributo = new Atributo();
//		atributo.setNome("tamanho");
//		atributo.setValor("P");
//		AtributoDao dao = new AtributoDao();
//		try {
//			dao.salvar(atributo);
//		} catch (Exception e) {
//			System.out.println(e);
//		}
		
		//INSERT DE APROVADOR
//		Aprovador aprovador = new Aprovador();
//		aprovador.setEmail("emailteste@email.com");
//		aprovador.setNome("Jóse Santos");
//		aprovador.setSenha("BJUX6ajn");
//		AprovadorBo bo = new AprovadorBo();
//		try {
//			
//			bo.salvar(aprovador);
//		} catch (Exception e) { 
//			System.out.println(e);
//		}
		
		
		//INSERT COMPRADOR
//		Comprador comprador  = new Comprador();
//		comprador.setEmail("emailtestecomprador@email.com");
//		comprador.setNome("Marcos Andre");
//		comprador.setSenha("DmJeTNAw");
//		CompradorBo bo = new CompradorBo();
//		try {
//			
//			bo.salvar(comprador);
//		} catch (Exception e) { 
//			System.out.println(e);
//		}
		
		//INSERT GERENTE
		Gerente gerente = new Gerente();
		gerente.setEmail("emailteste@gerente.com");
		gerente.setNome("Carlos Alberto");
		gerente.setSenha("xTT1ekeP");
		GerenteBo bo2 = new GerenteBo();
		try {
			
			bo2.salvar(gerente);
		} catch (Exception e) { 
			System.out.println(e);
		}
		
		
		//INSERT FORNECEDOR
//		Fornecedor fornecedor = new Fornecedor();
//		fornecedor.setEmail("emailteste@fornecedor.com");
//		fornecedor.setNome("Loja Teste");
//		fornecedor.setEndereco("Rua XXX, YYY");
//		fornecedor.setTelefone("4199999999");
//		FornecedorBo bo3 = new FornecedorBo();
//		try {
//			
//			bo3.salvar(fornecedor);
//		} catch (Exception e) { 
//			System.out.println(e);
//		}
		
	}

}
