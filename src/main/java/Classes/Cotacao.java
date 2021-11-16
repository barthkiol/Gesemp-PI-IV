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
public class Cotacao {
	
	@Id
	@GeneratedValue (strategy=GenerationType.IDENTITY)
	private long id;
	
	
	@ManyToOne
	private Produto produto;
	
	@ManyToOne
	private Pedido pedido;
	
	private int quantidade;
	
	private double cotacao;
	
	private String entrega;
	
	public Cotacao() {
		
	}

	public Cotacao(long id, Produto produto, Pedido pedido, double cotacao, String entrega, int quantidade) {
		this.id = id;
		this.produto = produto;
		this.pedido = pedido;
		this.cotacao = cotacao;
		this.entrega = entrega;
		this.quantidade = quantidade;
	}

	public long getId() {
		return id;
	}

	public void setId(long id) {
		this.id = id;
	}

	public Produto getProduto() {
		return produto;
	}

	public void setProduto(Produto produto) {
		this.produto = produto;
	}

	public Pedido getPedido() {
		return pedido;
	}

	public void setPedido(Pedido pedido) {
		this.pedido = pedido;
	}

	public double getCotacao() {
		return cotacao;
	}

	public void setCotacao(double cotacao) {
		this.cotacao = cotacao;
	}

	public String getEntrega() {
		return entrega;
	}

	public void setEntrega(String entrega) {
		this.entrega = entrega;
	}

		
	public int getQuantidade() {
		return quantidade;
	}

	public void setQuantidade(int quantidade) {
		this.quantidade = quantidade;
	}

	@Override
	public String toString() {
		return "Cotacao [id=" + id + ", produto=" + produto + ", pedido=" + pedido + ", quantidade=" + quantidade
				+ ", cotacao=" + cotacao + ", entrega=" + entrega + "]";
	}

	
	
	
	
	
	
	

}
