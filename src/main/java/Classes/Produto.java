package Classes;
import java.util.ArrayList;
import java.util.List;

import javax.persistence.Entity;
import javax.persistence.GeneratedValue;
import javax.persistence.GenerationType;
import javax.persistence.Id;
import javax.persistence.JoinColumn;
import javax.persistence.JoinTable;
import javax.persistence.ManyToMany;
import javax.persistence.ManyToOne;

@Entity
public class Produto {

	
	@Id
	@GeneratedValue (strategy=GenerationType.IDENTITY)
	private long id;
	
	private String nome;
	private String sku;
	private String ean;
	private String descricao;
	
	
	
	
	
//	@ManyToMany(mappedBy="produtos")
//	private List<Pedido> pedidos;
//	
//	public List<Pedido> getPedidos() {
//		return pedidos;
//	}
//	
//	public void adicionaPedido(Pedido p) {
//		pedidos.add(p);
//	}
//	public void removePedido(Pedido p) {
//		pedidos.remove(p);
//	}
//	public Pedido getPedido(int posicao) {
//		return pedidos.get(posicao);
//	}
//	
	
	
	@ManyToOne
	private Fornecedor fornecedor;
	
	@ManyToOne
	private Categoria categoria;
	
	

	public Produto() {
		//pedidos = new ArrayList<Pedido>();
	}

	
	public Produto(long id, String nome, String sku, String ean, Fornecedor fornecedor, Categoria categoria, String descricao) {
		this.id = id;
		this.nome = nome;
		this.sku = sku;
		this.ean = ean;
		this.fornecedor = fornecedor;
		this.categoria = categoria;
		this.descricao = descricao;
		//pedidos = new ArrayList<Pedido>();
	}

	public long getId() {
		return id;
	}

	public void setId(long id) {
		this.id = id;
	}

	public String getNome() {
		return nome;
	}

	public void setNome(String nome) {
		this.nome = nome;
	}

	public String getSku() {
		return sku;
	}

	public void setSku(String sku) {
		this.sku = sku;
	}

	public String getEan() {
		return ean;
	}

	public void setEan(String ean) {
		this.ean = ean;
	}


	public Fornecedor getFornecedor() {
		return fornecedor;
	}

	public void setFornecedor(Fornecedor fornecedor) {
		this.fornecedor = fornecedor;
	}

	public Categoria getCategoria() {
		return categoria;
	}

	public void setCategoria(Categoria categoria) {
		this.categoria = categoria;
	}
	


	public String getDescricao() {
		return descricao;
	}

	public void setDescricao(String descricao) {
		this.descricao = descricao;
	}

	@Override
	public String toString() {
		return "Produto [id=" + id + ", nome=" + nome + ", sku=" + sku + ", ean=" + ean + ", fornecedor="
				+ fornecedor + ", categoria=" + categoria + ",descricao= "+ descricao + "]";
	}


	
	
	
	
	
	
}
