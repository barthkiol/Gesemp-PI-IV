package dao;

import java.sql.*;
import java.util.*;

import javax.persistence.EntityManager;
import javax.persistence.NoResultException;
import javax.persistence.Query;

import Classes.Gerente;



public class GerenteDao {

	private Connection con = null; 
	
	public String salvar(Gerente gerente) throws Exception {
		//String retorno;
		try {
			EntityManager em = Conexao.getEntityManager();			
			em.getTransaction().begin();
			em.persist(gerente);
			em.getTransaction().commit();			
			return "Ok";
		} catch(Exception e) {
			throw new Exception("Erro gravando Gerente: "+e.getMessage());
		} 
					
	}
	// alterar
		public String alterar(Gerente gerente) throws Exception {
			try {			
				EntityManager em = Conexao.getEntityManager();			
				em.getTransaction().begin();
				em.merge(gerente);
				em.getTransaction().commit();			
				return "Ok";			
			} catch(Exception e) {
				throw new Exception("Erro gravando Gerente: "+e.getMessage());
			}		
		}
		
		// excluir
		public String deletar(Gerente gerente) throws Exception {
			try {
				EntityManager em = Conexao.getEntityManager();
				Gerente c = em.find(Gerente.class, gerente.getId());
				em.getTransaction().begin();
				em.remove(c);
				em.getTransaction().commit();			
				return "Ok";
			}catch(Exception e) {
				throw new Exception("Erro gravando  Gerente: " + e.getMessage());
			}		
		}	
		
		// consultar
		public List<Gerente> consultar() throws Exception{
			// criar uma var para lista
			EntityManager em = Conexao.getEntityManager();
			Query q = em.createQuery("from Gerente");
			return q.getResultList();				
		}
		
		public Gerente getGerente(Integer id) {

			 EntityManager em = Conexao.getEntityManager();
		      try {
		    	  Gerente gerente = (Gerente) em.createQuery("SELECT c from Gerente c where c.id = :id").setParameter("id", id).getSingleResult();
		      

		        return gerente;
		      } catch (NoResultException e) {
		            return null;
		      }
		    }
}
